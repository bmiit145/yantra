<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Campaign;
use App\Models\Contact;
use App\Models\Country;
use App\Models\CrmStage;
use App\Models\Favorite;
use App\Models\generate_lead;
use App\Models\PersonTitle;
use App\Models\Source;
use App\Models\State;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\EncryptionService;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::leftjoin('generate_lead', 'activities.lead_id', '=', 'generate_lead.id')
            ->select('activities.*', 'generate_lead.product_name', 'generate_lead.probability', 'activities.activity_type') // Assuming 'type' column holds activity type
            ->get()
            ->groupBy('lead_id');
        $users = User::all();
        $currentUser = auth()->user();

        // $dueDate = \Carbon\Carbon::parse($activities->due_date);
        // $daysDiff = \Carbon\Carbon::now()->diffInDays($dueDate, false);
        // return $daysDiff;

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


        return view('lead.viewactivity', compact('activities', 'users', 'currentUser', 'getFavoritesFilter', 'Countrs', 'tages', 'users', 'customers', 'Sources', 'CrmStages', 'States', 'PersonTitle', 'Campaigns'));
    }


    public function filterActivities(Request $request)
    {
        $tags = $request->tags ?? [];

        // Normalize tags to handle "Lost & Archived" as "Lost"
        $normalizedTags = array_map(function ($tag) {
            return $tag === 'Lost & Archived' ? 'Lost' : $tag;
        }, $tags);

        // Initialize filters
        $includeMyActivities = in_array('My Activities', $normalizedTags);
        $includeUnassigned = in_array('Unassigned', $normalizedTags);
        $includeLost = in_array('Lost', $normalizedTags);

        $includeLateActivities = in_array('Late Activities', $normalizedTags);
        $includeTodayActivities = in_array('Today Activities', $normalizedTags);
        $includeFutureActivities = in_array('Future Activities', $normalizedTags);

        // Build the query
        $query = Activity::leftJoin('generate_lead', 'activities.lead_id', '=', 'generate_lead.id')
            ->select('activities.*', 'generate_lead.product_name', 'generate_lead.probability', 'activities.activity_type');

        if ($includeLost) {
            $query->where('is_lost', '2'); // Assuming '2' indicates "Lost"
        }

        if ($includeMyActivities || $includeUnassigned) {
            $query->where(function ($query) use ($includeMyActivities, $includeUnassigned) {
                if ($includeMyActivities) {
                    $query->where('status', 0); // Directly filter by status
                }
                if ($includeUnassigned) {
                    $query->orWhereNull('sales_person');
                }
            });
        }

        if ($includeLateActivities || $includeTodayActivities || $includeFutureActivities) {
            $query->where(function ($query) use ($includeLateActivities, $includeTodayActivities, $includeFutureActivities) {
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


        // Initially assume no filters are applied
        foreach ($tags as $selectedDate) {
            // Check for month names
            if (in_array($selectedDate, [date('F'), date('F', strtotime('-1 month')), date('F', strtotime('-2 months'))])) {
                $year = date('Y');
                $month = date('m', strtotime($selectedDate));

                $query->orWhere(function ($q) use ($year, $month) {
                    $q->where('is_lost', '1')
                        ->whereYear('activities.created_at', $year) // Specify the table name
                        ->whereMonth('activities.created_at', $month); // Specify the table name
                });
            }
            // Check for years
            elseif (in_array($selectedDate, [date('Y'), date('Y', strtotime('-1 year')), date('Y', strtotime('-2 year'))])) {
                $year = (int)$selectedDate;
                if (generate_lead::whereYear('created_at', $year)->where('is_lost', '1')->exists()) {
                    $query->orWhere(function ($q) use ($year) {
                        $q->whereYear('activities.created_at', $year) // Specify the table name
                            ->where('is_lost', '1');
                    });
                }
            }
        }

        $activities = $query->with('getUser')->get();

        return response()->json($activities);
    }

    public function filterActivityCustomFilter(Request $request)
{
    // Extract input values
    $filterType = $request->input('filterType');
    $operatesValue = $request->input('operatesValue');
    $filterValue = $request->input('filterValue');

    // Create a query starting with activities
    $query = Activity::query()
        ->leftJoin('generate_lead', 'generate_lead.id', '=', 'activities.lead_id')
        ->select('activities.*', 'generate_lead.product_name', 'generate_lead.probability', 'activities.activity_type');

    // Apply filters based on filter type
    switch ($filterType) {
        case 'Country':
            $query->where(function ($q) use ($operatesValue, $filterValue) {
                $q->whereHas('getLead.getCountry', function ($q) use ($operatesValue, $filterValue) {
                    $q->where('name', $operatesValue, $filterValue);
                })
                ->orWhereHas('getLead.getAutoCountry', function ($q) use ($operatesValue, $filterValue) {
                    $q->where('name', $operatesValue, $filterValue);
                });
            });
            break;

        case 'Zip':
            $query->where('generate_lead.zip', $operatesValue, $filterValue);
            break;

        case 'Tags':
            $query->whereHas('tags', function ($q) use ($operatesValue, $filterValue) {
                $q->where('name', $operatesValue, $filterValue);
            });
            break;

        case 'Created by':
            $query->whereHas('getUser', function ($q) use ($operatesValue, $filterValue) {
                $q->where('name', $operatesValue, $filterValue);
            });
            break;

        case 'Created on':
            $query->whereDate('activities.created_at', $operatesValue, $filterValue);
            break;

        case 'Customer':
            $query->where('generate_lead.name', $operatesValue, $filterValue);
            break;

        case 'Email':
            $query->where('generate_lead.email', $operatesValue, $filterValue);
            break;

        case 'ID':
            $query->where('activities.id', $operatesValue, $filterValue);
            break;

        case 'Phone':
            $query->where('generate_lead.phone', $operatesValue, $filterValue);
            break;

        case 'Priority':
            $query->where('activities.priority', $operatesValue, $filterValue);
            break;

        case 'Probability':
            $query->where('generate_lead.probability', $operatesValue, $filterValue);
            break;

        case 'Referred By':
            $query->where('generate_lead.referred_by', $operatesValue, $filterValue);
            break;

        case 'Salesperson':
            $salespersonId = EncryptionService::encrypt($filterValue);
            $query->whereHas('getUser', function ($q) use ($operatesValue, $salespersonId) {
                $q->where('email', $operatesValue, $salespersonId);
            });
            break;

        case 'Source':
            $query->whereHas('getLead.getSource', function ($q) use ($operatesValue, $filterValue) {
                $q->where('name', $operatesValue, $filterValue);
            });
            break;

        case 'Stage':
            $query->where('activities.stage', $operatesValue, $filterValue);
            break;

        case 'State':
            $query->where(function ($q) use ($operatesValue, $filterValue) {
                $q->whereHas('getLead.getState', function ($q) use ($operatesValue, $filterValue) {
                    $q->where('name', $operatesValue, $filterValue);
                })
                ->orWhereHas('getLead.getAutoState', function ($q) use ($operatesValue, $filterValue) {
                    $q->where('name', $operatesValue, $filterValue);
                });
            });
            break;

        case 'Street':
            $query->where('generate_lead.address_1', $operatesValue, $filterValue);
            break;

        case 'Street2':
            $query->where('generate_lead.address_2', $operatesValue, $filterValue);
            break;

        case 'Type':
            $query->where('activities.type', $operatesValue, $filterValue);
            break;

        case 'Website':
            $query->where('generate_lead.website_link', $operatesValue, $filterValue);
            break;

        case 'Campaign':
            $query->whereHas('getLead.getCampaign', function ($q) use ($operatesValue, $filterValue) {
                $q->where('name', $operatesValue, $filterValue);
            });
            break;

        case 'City':
            $query->where('generate_lead.city', $operatesValue, $filterValue);
            break;

        default:
            // Handle cases where the filterType does not match any case
            break;
    }

    // Eager load relationships before fetching results
    $activities = $query->with([
        'getUser', 
        'getCountry', 
        'getAutoCountry', 
        'getState', 
        'getAutoState'
    ])->get();

    // Return JSON response
    return response()->json([
        'success' => true,
        'data' => $activities
    ], 200);
}



    public function create()
    {
        return view('lead.createactivity');
    }

    public function allActivities(Request $request)
    {
        try {
            $getAssignedTo = User::orderBy('id', 'DESC')->get();
            $data = Activity::where('status', '0');

            // Check for the filter type
            if ($request->has('filterType')) {
                $filterType = $request->filterType;

                switch ($filterType) {
                    case 'late':
                        $data = $data->where('due_date', '<', now()->toDateString());
                        break;

                    case 'today':
                        $data = $data->whereDate('due_date', '=', now()->toDateString());
                        break;

                    case 'future':
                        $data = $data->where('due_date', '>', now()->toDateString());
                        break;

                    default:
                        break;
                }
            } else {
                // If no filter is applied, show all activities as before
                $data = $data->where(function ($query) {
                    $query->whereHas('getLead', function ($query) {
                        $query->where('is_lost', '1');
                    })
                        ->orWhereHas('getPipeline', function ($query) {
                            $query->where('is_lost', '1');
                        });
                });
            }

            // Get the filtered data
            $data = $data->get();

            return view('lead.activity.index', compact('getAssignedTo', 'data'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Something Went wrong!');
        }
    }

    public function AllActivitiesGetLeads(Request $request)
    {
        // Page Length
        $pageNumber = ($request->start / $request->length) + 1;
        $pageLength = $request->length;
        $skip = ($pageNumber - 1) * $pageLength;

        // Page Order
        $orderColumnIndex = $request->order[0]['column'] ?? '0';
        $orderBy = $request->order[0]['dir'] ?? 'desc';

        // Build Query
        $query = Activity::where('status', '0')
            ->where(function ($query) {
                $query->whereHas('getLead', function ($query) {
                    $query->where('is_lost', '1');
                })
                    ->orWhereHas('getPipeline', function ($query) {
                        $query->where('is_lost', '1');
                    });
            });

        // Determine Order By Column
        $orderByName = 'activity_type';
        switch ($orderColumnIndex) {
            case '0':
                $orderByName = 'activity_type';
                break;
            case '1':
                $orderByName = 'assigned_to';
                break;
            case '2':
                $orderByName = 'summary';
                break;
            case '3':
                $orderByName = 'due_date';
                break;
                // Add more cases as needed
            default:
                $orderByName = 'activity_type';
                break;
        }
        $query = $query->orderBy($orderByName, $orderBy);

        $currentDate = date("Y-m-d");
        // Apply filter based on filterType
        if (isset($request->filterType)) {
            switch ($request->filterType) {
                case 'today':
                    // Only includes today's activities
                    $query->whereDate('due_date', $currentDate);
                    break;
                case 'late':
                    // Only includes activities due before today (i.e., overdue)
                    $query->where('due_date', '<', $currentDate);
                    break;
                case 'future':
                    // Activities due after today
                    $query->where('due_date', '>', $currentDate);
                    break;
            }
        }

        // Get Total Records
        $recordsTotal = $query->count();

        // Get Filtered Records
        $recordsFiltered = $recordsTotal; // Will be updated after applying search

        // Get Paginated Results
        $activity = $query->with('getLead', 'getUser', 'getPipeline')->skip($skip)->take($pageLength)->get();

        return response()->json([
            "draw" => $request->draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            'data' => $activity
        ], 200);
    }

    // Update activity status to 'done'
    public function markAsDone($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->status = 1;
        $activity->save();

        return response()->json(['success' => true]);
    }

    // Delete activity
    public function cancelActivity($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return response()->json(['success' => true]);
    }

    // Snooze activity by 7 days
    public function snoozeActivity($id)
    {
        $activity = Activity::findOrFail($id);
        $dueDate = Carbon::parse($activity->due_date);
        $newDueDate = $dueDate->copy()->addDays(7);
        $activity->due_date = $newDueDate->format('Y-m-d');
        $activity->save();

        return response()->json(['success' => true]);
    }

    public function kanbanIndex()
    {
        $activityKanban = Activity::orderBy('id', 'desc')->where('status', '0')
            ->whereHas('getLead', function ($query) {
                $query->where('is_lost', '1');
            })
            ->get();
        $currentUser = auth()->user();
        return view('lead.activity.kanban', compact('currentUser', 'activityKanban'));
    }

    public function activityFilter(Request $request)
    {
        // Get all tags from the request
        $tags = $request->tags ?? [];

        $normalizedTags = array_map('trim', array_map('strtolower', $tags));
        // Initialize variables to determine which filters to apply
        $includeMyActivities = in_array('my activities', $normalizedTags);
        $includeOverdue = in_array('overdue', $normalizedTags);
        $includeToday = in_array('today', $normalizedTags);
        $includeFuture = in_array('future', $normalizedTags);
        $includeDone = in_array('done', $normalizedTags);

        // Start building the query
        $leadsQuery = Activity::query();

        // Apply status filters
        $leadsQuery->where(function ($query) use ($includeOverdue, $includeToday, $includeFuture, $includeDone) {
            if ($includeOverdue) {
                $query->orWhere(function ($query) {
                    $query->where('status', '0')
                        ->where('due_date', '<', date('Y-m-d'));
                });
            }

            if ($includeToday) {
                $query->orWhere(function ($query) {
                    $query->where('status', '0')->where('due_date', '=', date('Y-m-d'));
                });
            }

            if ($includeFuture) {
                $query->orWhere(function ($query) {
                    $query->where('status', '0')->where('due_date', '>', date('Y-m-d'));
                });
            }

            if ($includeDone) {
                $query->orWhere(function ($query) {
                    $query->where('status', '1'); // Adjust based on how 'done' is represented in your database
                });
            }
        });

        $currentUserId = auth()->id(); // For Laravel, use auth()->id() or appropriate method for your framework

        // Apply 'My Activities' filter if included
        if ($includeMyActivities) {
            $leadsQuery->where(function ($query) use ($currentUserId) {
                $query->where('assigned_to', $currentUserId)
                    ->where(function ($query) {
                        $query->where('status', '0')
                            ->orWhere('status', '!=', '1'); // Ensure correct logic for 'done' status
                    });
            });
        }

        // Exclude records where related 'getLead' has 'is_lost' set to 2
        $leadsQuery->whereDoesntHave('getLead', function ($query) {
            $query->where('is_lost', 2);
        });
        $leadsQuery->whereDoesntHave('getPipeline', function ($query) {
            $query->where('is_lost', 2);
        });

        // Always include necessary relationships
        $leadsQuery->with('getLead', 'getPipeline', 'getUser');

        // Fetch results
        $generateLeads = $leadsQuery->get();

        // Return results as JSON
        return response()->json([
            'success' => true,
            'data' => $generateLeads
        ], 200);
    }


    public function activityCustomFilter(Request $request)
    {
        // Retrieve filter parameters
        $filterType = $request->input('filterType');
        $operatesValue = $request->input('operatesValue');
        $filterValue = $request->input('filterValue');

        // Create a query
        $query = Activity::whereHas('getLead', function ($q) {
            $q->where('is_lost', 1);
        });

        // Apply filters based on filter type
        switch ($filterType) {
            case 'Action':
                if ($filterValue === 'None') {
                    // Apply filter to only return activities with 'to-do' activity_type
                    $query->where('status', '0')->where('activity_type', 'to-do');
                } else {
                    $query->where('status', '0')->where('activity_type', $operatesValue, $filterValue);
                }
                break;
            case 'Activity Type':
                $query->where('status', 0)->where('activity_type', $operatesValue, $filterValue);
                break;
            case 'Assigned to':
                $AssignedToID = EncryptionService::encrypt($filterValue);
                $user = User::where('email', $AssignedToID)->first();
                $query->whereHas('getUser', function ($q) use ($operatesValue, $AssignedToID) {
                    $q->where('email', $operatesValue, $AssignedToID);
                })->whereHas('getLead', function ($q) {
                    $q->where('is_lost', 1);
                })->where('status', '0');
                break;
            case 'Created on':
                $query->where('status', '0')->whereDate('created_at', $filterValue);
                break;
            case 'Done Date':
                $query->whereDate('done_date', $filterValue);
                break;
            case 'Due Date':
                $query->where('status', '0')->whereDate('due_date', $operatesValue, $filterValue);
                break;
            case 'ID':
                $query->where('status', '0')->where('id', $operatesValue, $filterValue);
                break;
            case 'Last Updated on':
                $query->where('status', 0)->whereDate('updated_at', $operatesValue, $filterValue);
                break;
            case 'Note':
                $query->where('status', '0')->where('note', $operatesValue, $filterValue);
                break;
            case 'Summary':
                $query->where('status', '0')->where('summary', $operatesValue, $filterValue);
                break;
            default:
                // Handle cases where the filterType does not match any case
                break;
        }

        // Execute the query with relationships
        $query->with('getLead', 'getUser');

        // Fetch results
        $customFilter = $query->where('status', '0')->get();

        // Return JSON response
        return response()->json([
            'success' => true,
            'data' => $customFilter
        ], 200);
    }


    public function submitFeedback(Request $request)
    {
        $activity = Activity::where('id', $request->activity_id)->first();

        if ($activity) {
            $activity->status_feedback = $request->feedback;
            $activity->status = 1;
            $activity->save();

            return response()->json(['message' => 'Feedback submitted successfully.']);
        }

        return response()->json(['message' => 'Activity not found.'], 404);
    }

    public function feedbackActivityShow($id)
    {
        $activity = Activity::findOrFail($id);
        return response()->json($activity);
    }

    public function feedbackActivityUpdate(Request $request)
    {
        $activity = Activity::find($request->id);
        $activity->activity_type = $request->activity_type;
        $activity->due_date = $request->due_date;
        $activity->summary = $request->summary;
        $activity->assigned_to = $request->assigned_to;
        $activity->note = $request->log_note; // Assuming you want to save this too
        $activity->save();

        return response()->json(['message' => 'Activity updated successfully!', 'status' => $activity->status]);
    }

    public function feedbackActivityDelete($id)
    {
        $activity = Activity::find($id);

        if ($activity) {
            $activity->delete();
            return response()->json(['message' => 'Activity deleted successfully!']);
        } else {
            return response()->json(['message' => 'Activity not found.'], 404);
        }
    }

    // Star Store functuin
    public function startStore(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'is_star' => 'required|boolean',
        ]);

        // Find the activity by ID
        $activity = Activity::find($id);

        if (!$activity) {
            return response()->json(['success' => false, 'message' => 'Activity not found'], 404);
        }

        // Update the 'is_star' field
        $activity->is_star = $request->input('is_star');
        $activity->save();

        // Return a success response
        return response()->json(['success' => true]);
    }
}
