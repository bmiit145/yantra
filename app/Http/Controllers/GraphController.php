<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Contact;
use App\Models\Country;
use App\Models\CrmStage;
use App\Models\Favorite;
use App\Models\PersonTitle;
use App\Models\Source;
use App\Models\State;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\generate_lead;
use Illuminate\Support\Facades\Auth;
use App\Services\EncryptionService;

class GraphController extends Controller
{
    // public function index()
    // {
    //     $data = generate_lead::where('is_lost', 1)
    //         ->where('sales_person', Auth::user()->id)
    //         ->selectRaw('sales_person, COUNT(*) as lead_count')
    //         ->groupBy('sales_person')
    //         ->get();

    //     $getFavoritesFilter = Favorite::where('filter_type', 'lead')->get();
    //     $Countrs = Country::all();
    //     $tages = Tag::where('tage_type', 2)->get();
    //     $users = User::all();
    //     $customers = Contact::all();
    //     $Sources = Source::all();
    //     $CrmStages = CrmStage::all();
    //     $States = State::all();
    //     $PersonTitle = PersonTitle::all();
    //     $Campaigns = Campaign::all();

    //     return view('lead.graph', compact('data', 'getFavoritesFilter', 'Countrs', 'tages', 'users', 'customers', 'Sources', 'CrmStages', 'States', 'PersonTitle', 'Campaigns'));
    // }

    public function index()
    {
        $data = generate_lead::where('is_lost', 1)
            ->selectRaw('sales_person, COUNT(*) as lead_count')
            ->groupBy('sales_person')
            ->get();

        $getFavoritesFilter = Favorite::where('filter_type', 'lead')->get();
        $Countrs = Country::all();
        $tages = Tag::where('tage_type', 2)->get();
        $users = User::all();
        $customers = Contact::all();
        $Sources = Source::all();
        $CrmStages = CrmStage::all();
        $States = State::all();
        $PersonTitle = PersonTitle::all();
        $Campaigns = Campaign::all();

        return view('lead.graph', compact('data', 'getFavoritesFilter', 'Countrs', 'tages', 'users', 'customers', 'Sources', 'CrmStages', 'States', 'PersonTitle', 'Campaigns'));
    }

    public function leadGrapgFilter(Request $request)
    {
        // Get the selected tags from the request
        $tags = $request->tags ?? [];

        // Normalize tags to handle "Lost & Archived" as "Lost"
        $normalizedTags = array_map(function ($tag) {
            return $tag === 'Lost & Archived' ? 'Lost' : $tag;
        }, $tags);

        // Initialize variables to determine which filters to apply
        $includeMyActivities = in_array('My Activities', $normalizedTags);
        $includeUnassigned = in_array('Unassigned', $normalizedTags);
        $includeLost = in_array('Lost', $normalizedTags);
        $includeLateActivities = in_array('Late Activities', $normalizedTags);
        $includeTodayActivities = in_array('Today Activities', $normalizedTags);
        $includeFutureActivities = in_array('Future Activities', $normalizedTags);

        // Start the query for generate_lead and join with users table
        $data = generate_lead::query()
            ->selectRaw('users.email as sales_person, COUNT(*) as lead_count')
            ->leftJoin('users', 'generate_lead.sales_person', '=', 'users.id') // Adjust the join based on your schema
            ->groupBy('users.email');

        // Apply the "Lost" filter if included
        if ($includeLost) {
            $data->where('is_lost', 2); // Assuming '2' indicates "Lost"
        }

        if ($includeMyActivities || $includeUnassigned) {
            $data->where(function ($query) use ($includeMyActivities, $includeUnassigned) {
                if ($includeMyActivities) {
                    $query->whereHas('activities', function ($q) {
                        $q->where('status', 0); // Status for "My Activities"
                    });
                }
                if ($includeUnassigned) {
                    $query->orWhereNull('sales_person');
                }
            });
        }

        if ($includeLateActivities || $includeTodayActivities || $includeFutureActivities) {
            $data->whereHas('activities', function ($query) use ($includeLateActivities, $includeTodayActivities, $includeFutureActivities) {
                $conditions = [];

                if ($includeLateActivities) {
                    $conditions[] = function ($q) {
                        $q->where('due_date', '<', date('Y-m-d'))
                            ->where('status', 0);
                    };
                }

                if ($includeTodayActivities) {
                    $conditions[] = function ($q) {
                        $q->where('due_date', '=', date('Y-m-d'))
                            ->where('status', 0);
                    };
                }

                if ($includeFutureActivities) {
                    $conditions[] = function ($q) {
                        $q->where('due_date', '>', date('Y-m-d'))
                            ->where('status', 0);
                    };
                }

                if (!empty($conditions)) {
                    $query->where(function ($subQuery) use ($conditions) {
                        foreach ($conditions as $condition) {
                            $subQuery->orWhere($condition);
                        }
                    });
                }
            });
        }

        // Check for date filters
    $dateFilterApplied = false;

    foreach ($tags as $selectedDate) {
        // Check for month names
        if (in_array($selectedDate, [date('F'), date('F', strtotime('-1 month')), date('F', strtotime('-2 months'))])) {
            $year = date('Y');
            $month = date('m', strtotime($selectedDate));

            $data->orWhere(function ($query) use ($year, $month) {
                $query->where('is_lost', '1')
                    ->whereYear('generate_lead.created_at', $year) // Specify the table for created_at
                    ->whereMonth('generate_lead.created_at', $month); // Specify the table for created_at
            });
            $dateFilterApplied = true;
        }
        // Check for years
        elseif (in_array($selectedDate, [date('Y'), date('Y', strtotime('-1 year')), date('Y', strtotime('-2 year'))])) {
            $year = (int) $selectedDate;
            $yearExists = generate_lead::whereYear('created_at', $year)
                ->where('is_lost', '1')
                ->exists();

            if ($yearExists) {
                $data->orWhere(function ($query) use ($year) {
                    $query->whereYear('generate_lead.created_at', $year) // Specify the table for created_at
                        ->where('is_lost', '1');
                });
                $dateFilterApplied = true;
            }
        }
    }

    // If a date filter was applied, execute the query
    if ($dateFilterApplied) {
        $leads = $data->get(); // Execute the query and get the results
    }

        // Fetch the results
        $results = $data->get();

        // Prepare the data for the response
        $chartData = $results->map(function ($item) {
            return [
                'sales_person' => $item->sales_person ? base64_decode($item->sales_person) : 'Unassigned',
                'today_activity_count' => $item->lead_count // Adjust if needed
            ];
        });

        // Return the data in JSON format
        return response()->json(['data' => $chartData]);
    }

    public function leadGrapgCustomFilter(Request $request)
    {
        // Retrieve the filter parameters
        $filterType = $request->input('filterType');
        $operatesValue = $request->input('operatesValue');
        $filterValue = $request->input('filterValue');

        // Create a query
        $query = generate_lead::query();

        // Apply filters based on filter type
        switch ($filterType) {
            case 'Country':
                $query->whereHas('getCountry', function ($q) use ($operatesValue, $filterValue) {
                    $q->where('name', $operatesValue, $filterValue);
                });
                break;
            case 'Zip':
                $query->where('zip', $operatesValue, $filterValue);
                break;
            case 'Tags':
                $query->whereHas('tags', function ($q) use ($operatesValue, $filterValue) {
                    $q->where('name', $operatesValue, $filterValue);
                });
                break;
            case 'Created by':
                $createdByName = $filterValue;
                $user = User::where('name', $createdByName)->first();
                $query->whereHas('getUser', function ($q) use ($operatesValue, $createdByName) {
                    $q->where('name', $operatesValue, $createdByName);
                });
                break;
            case 'Created on':
                $query->whereDate('created_at', $operatesValue, $filterValue);
                break;
            case 'Customer':
                $query->where('name', $operatesValue, $filterValue);
                break;
            case 'Email':
                $query->where('email', $operatesValue, $filterValue);
                break;
            case 'ID':
                $query->where('id', $operatesValue, $filterValue);
                break;
            case 'Phone':
                $query->where('phone', $operatesValue, $filterValue);
                break;
            case 'Priority':
                $query->where('priority', $operatesValue, $filterValue);
                break;
            case 'Probability':
                $query->where('probability', $operatesValue, $filterValue);
                break;
            case 'Referred By':
                $query->where('referred_by', $operatesValue, $filterValue);
                break;
            case 'Salesperson':
                $salespersonId = EncryptionService::encrypt($filterValue);
                $user = User::where('email', $salespersonId)->first();
                $query->whereHas('getUser', function ($q) use ($operatesValue, $salespersonId) {
                    $q->where('email', $operatesValue, $salespersonId);
                });
                break;
            case 'Source':
                $query->whereHas('getSource', function ($q) use ($operatesValue, $filterValue) {
                    $q->where('name', $operatesValue, $filterValue);
                });
                break;
            case 'Stage':
                $query->where('stage', $operatesValue, $filterValue);
                break;
            case 'State':
                $query->where(function ($q) use ($operatesValue, $filterValue) {
                    $q->whereHas('getState', function ($q) use ($operatesValue, $filterValue) {
                        $q->where('name', $operatesValue, $filterValue);
                    })
                        ->orWhereHas('getAutoState', function ($q) use ($operatesValue, $filterValue) {
                            $q->where('name', $operatesValue, $filterValue);
                        });
                });
                break;
            case 'Street':
                $query->where('address_1', $operatesValue, $filterValue);
                break;
            case 'Street2':
                $query->where('address_2', $operatesValue, $filterValue);
                break;
            case 'Title':
                $query->whereHas('getTilte', function ($q) use ($operatesValue, $filterValue) {
                    $q->where('title', $operatesValue, $filterValue);
                });
                break;
            case 'Type':
                $query->where('type', $operatesValue, $filterValue);
                break;
            case 'Website':
                $query->where('website_link', $operatesValue, $filterValue);
                break;
            case 'Campaign':
                $query->whereHas('getCampaign', function ($q) use ($operatesValue, $filterValue) {
                    $q->where('name', $operatesValue, $filterValue);
                });
                break;
            case 'City':
                $query->where('city', $operatesValue, $filterValue);
                break;
            default:
                // Handle cases where the filterType does not match any case
                break;
        }

        // Group the results and count
        $query->selectRaw('users.email as sales_person, COUNT(*) as lead_count')
            ->leftJoin('users', 'generate_lead.sales_person', '=', 'users.id') // Adjust based on your schema
            ->groupBy('users.email');

        // Execute the query and get results
        $customFilter = $query->get();

        // Prepare the data for the response
        $chartData = $customFilter->map(function ($item) {
            return [
                'sales_person' => $item->sales_person ? base64_decode($item->sales_person) : 'Unassigned',
                'lead_count' => $item->lead_count // This will be your count
            ];
        });

        // Return JSON response
        return response()->json([
            'success' => true,
            'data' => $chartData
        ], 200);
    }

    public function leadGrapgGroupFilter(Request $request)
    {
        $selectedTags = json_decode($request->input('selectedTags'), true);
        if (!is_array($selectedTags)) {
            return response()->json(['error' => 'Invalid tags format'], 400);
        }

        $leads = generate_lead::with(['getCountry', 'getAutoCountry', 'getState', 'getAutoState', 'getUser', 'activities', 'getSource', 'getCampaign', 'getMedium'])->get();
        $leadCounts = [];

        foreach ($leads as $lead) {
            foreach ($selectedTags as $tag) {
                $key = match ($tag) {
                    'City' => $lead->city ?? 'None',
                    'Country' => $lead->getCountry->name ?? ($lead->getAutoCountry->name ?? 'None'),
                    'State' => $lead->getState->name ?? ($lead->getAutoState->name ?? 'None'),
                    'Salesperson' => $lead->getUser->email ?? 'None',
                    'Source' => $lead->getSource->name ?? 'None',
                    'Campaign' => $lead->getCampaign->name ?? 'None',
                    'Medium' => $lead->getMedium->name ?? 'None',
                    'Sales Team' => 'Sales',
                    'Creation Date:Quarter' => 'Q' . Carbon::parse($lead->created_at)->quarter . ' ' . Carbon::parse($lead->created_at)->year,
                    'Creation Date: Year' => Carbon::parse($lead->created_at)->format('Y'),
                    'Creation Date:Month' => Carbon::parse($lead->created_at)->format('F Y'), // E.g., March 2023
                    'Creation Date:Week' => 'Week ' . Carbon::parse($lead->created_at)->weekOfYear . ' ' . Carbon::parse($lead->created_at)->year,
                    'Creation Date:Day' => Carbon::parse($lead->created_at)->format('d-m-Y'),
                    'Priority' => $lead->priority,
                    'Active' => $lead->activities->count() > 0 ? 'Yes' : 'No',
                    'Company' => $lead->company_name ?? 'None',
                    'Contact Name' => $lead->contact_name ?? 'None',
                    'Created by' => $lead->getUser ?? 'None',
                    'Created on' => Carbon::parse($lead->assignment_date)->format('d-m-Y') ?? 'None',
                    'Email' => $lead->email ?? 'None',
                    'Lost Reason' => $lead->lost_reason ?? 'None',
                    'Mobile' => $lead->mobile ?? 'None',
                    'Phone' => $lead->phone ?? 'None',
                    'referred' => $lead->referred_by->count() > 0 ? 'yes' : 'no',
                    'Stage' => $lead->getCrmStage->name ?? 'None',
                    'Street' => $lead->address_1 ?? 'None',
                    'Street2' => $lead->address_2 ?? 'None',
                    'Tags' => $lead->tags ?? 'None',
                    'Website' => $lead->website_link ?? 'None',
                    'Zip' => $lead->zip ?? 'None',
                    default => 'None'
                };

                if (!isset($leadCounts[$key])) {
                    $leadCounts[$key] = 0;
                }
                $leadCounts[$key]++;
            }
        }

        // Convert leadCounts associative array into an array of objects
        $formattedCounts = [];
        foreach ($leadCounts as $key => $count) {
            $formattedCounts[] = [
                'sales_person' => $key,
                'lead_count' => $count
            ];
        }

        return response()->json(['counts' => $formattedCounts]);
    }
}
