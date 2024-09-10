<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\generate_lead;
use App\Models\Opportunity;
use App\Models\PersonTitle;
use App\Models\Country;
use App\Models\state;
use App\Models\Tag;
use App\Models\LostReason;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    public function index($id = null)
    {
        // $data = generate_lead::with('tags')->get();
        // $datas = generate_lead::with('tags')->get();

        // // Filter out leads with unique product_name while preserving the first occurrence
        // $data = $datas->groupBy('product_name')->map(function ($group) {
        //     return $group->first();
        // });

        // return view('lead.index', compact('data'));
        return view('lead.index');
    }

    // public function getLeads(Request $request)
    // {
    //     $filter = $request->input('filter');

    //     if ($filter === 'my_activities') {
    //         // Fetch leads where activities status is 0
    //         $leads = generate_lead::whereHas('activities', function ($query) {
    //             $query->where('status', 0);
    //         })->get();
    //     } else {
    //         // Fetch all leads (default case)
    //         $leads = generate_lead::all();
    //     }

    //     return response()->json(['data' => $leads]);
    // }

    public function getLeads(Request $request)
    {
        // Page Length
        $pageNumber = ($request->start / $request->length) + 1;
        $pageLength = $request->length;
        $skip = ($pageNumber - 1) * $pageLength;

        // Page Order
        $orderColumnIndex = $request->order[0]['column'] ?? '0';
        $orderBy = $request->order[0]['dir'] ?? 'desc';

        // Build Query
        $query = generate_lead::query();

        // Apply Filter
        $filter = $request->filter ?? '';
        switch ($filter) {
            case 'my-activities':
                $query->whereHas('activities', function ($q) {
                    $q->where('status', 0);
                });
                break;
            case 'unassigned':
                $query->whereNull('sales_person');
                break;
            default:
                break;
        }

        // Search
        $searchValue = $request->search['value'] ?? '';
        if ($searchValue) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('product_name', 'like', "%{$searchValue}%")
                    ->orWhere('company_name', 'like', "%{$searchValue}%")
                    ->orWhere('address_1', 'like', "%{$searchValue}%")
                    ->orWhere('country', 'like', "%{$searchValue}%")
                    ->orWhere('email', 'like', "%{$searchValue}%");
            });
        }

        // Determine Order By Column
        $orderByName = 'product_name';
        switch ($orderColumnIndex) {
            case '0':
                $orderByName = 'product_name';
                break;
            case '1':
                $orderByName = 'company_name';
                break;
            case '2':
                $orderByName = 'address_1';
                break;
            case '3':
                $orderByName = 'country';
                break;
            // Add more cases as needed
            default:
                $orderByName = 'product_name';
                break;
        }

        $query = $query->orderBy($orderByName, $orderBy);

        // Get Total Records
        $recordsTotal = $query->count();

        // Get Filtered Records
        $recordsFiltered = $recordsTotal; // Will be updated after applying search

        if ($searchValue) {
            $recordsFiltered = $query->count();
        }

        // Get Paginated Results
        $leads = $query->with('getCountry','getState','getAutoCountry','getAutoState')->skip($skip)->take($pageLength)->get();

        return response()->json([
            "draw" => $request->draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            'data' => $leads
        ], 200);
    }

    public function create($id = null)
    {
        $titles = PersonTitle::all();
        $countrys = Country::all();
        $tags = Tag::where('tage_type', 2)->get();
        $data = generate_lead::find($id);
        $users = User::orderBy('id', 'DESC')->get();
        if ($data && isset($data->product_name)) {
            $count = generate_lead::where('product_name', $data->product_name)->count();
        } else {
            $count = 0;
        }
        if ($data) {
            $activitiesCount = Activity::where('lead_id', $data->id)->where('status', '0')->count();
        } else {
            $activitiesCount = 0;
        }
        if ($data) {
            $activities = Activity::orderBy('id', 'DESC')->where('status', '0')->where('lead_id', $data->id)->get();
        } else {
            $activities = 0;
        }
        if ($data) {
            $activitiesDone = Activity::orderBy('id', 'DESC')->where('status', '1')->where('lead_id', $data->id)->get();
        } else {
            $activitiesDone = 0;
        }
        // $data = generate_lead::select('generate_lead.*', 
        //                              'countries.name as country_name', 
        //                              'states.name as state_name', 
        //                              'tags.name as tag_name', 
        //                              'person_titles.title as title_name')
        //     ->leftJoin('countries', 'generate_lead.country', '=', 'countries.id')
        //     ->leftJoin('states', 'generate_lead.state', '=', 'states.id')
        //     ->leftJoin('tags', 'generate_lead.tag_id', '=', 'tags.id')
        //     ->leftJoin('person_titles', 'generate_lead.title', '=', 'pers on_titles.id')
        //     ->first();
        $lost_reasons = LostReason::all();

        return view('lead.creat', compact('titles', 'countrys', 'tags', 'data', 'users', 'count', 'activitiesCount', 'activities', 'lost_reasons', 'activitiesDone'));
    }

    public function store(Request $request)
    {
        $lead = generate_lead::updateOrCreate(
            ['id' => $request->lead_id],
            [
                'product_name' => $request->name_0,
                'probability' => $request->probability_0,
                'company_name' => $request->partner_name_0,
                'address_1' => $request->street_0,
                'address_2' => $request->street2_0,
                'city' => $request->city_0,
                'zip' => $request->zip_0,
                'state' => $request->state_id_0,
                'country' => $request->country_id_0,
                'website_link' => $request->website_0,
                'sales_person' => $request->sales_person,
                'sales_team' => $request->team_id_0,
                'contact_name' => $request->contact_name_0,
                'title' => $request->title_0,
                'email' => $request->email_from_1,
                'job_postion' => $request->function_0,
                'phone' => $request->phone_1,
                'mobile' => $request->mobile_0,
                'tag_id' => $request->has('tag_ids_1') && $request->tag_ids_1 !== null ? implode(',', $request->tag_ids_1) : null,
                'lead_type' => '1',
                'priority' => $request->priority,

            ]
        );

        // Log changes
        $action = $request->lead_id ? 'updated' : 'created';
        $message = $action === 'updated' ? 'Lead updated successfully' : 'Lead created successfully';

        // Fetch the original data if it's an update
        if ($request->lead_id) {
            $originalData = generate_lead::find($request->lead_id)->getOriginal();
            $changes = [];

            // Define the fields you want to check for changes
            $fields = ['product_name', 'probability', 'company_name', 'address_1', 'address_2', 'city', 'state', 'zip', 'country', 'website_link', 'sales_person', 'sales_team', 'contact_name', 'title', 'email', 'job_postion', 'phone', 'mobile', 'tag_id'];

            // Iterate over fields to check for changes
            foreach ($fields as $field) {
                if (isset($originalData[$field]) && $originalData[$field] != $lead->$field) {
                    $changes[$field] = [
                        'old' => $originalData[$field] ?? 'None',
                        'new' => $lead->$field ?? 'None'
                    ];
                }
            }

            // Create message only if there are changes
            if (!empty($changes)) {
                $message .= '. Changes: ' . json_encode($changes, JSON_PRETTY_PRINT);
            }
        }

        Log::info($message, ['lead_id' => $lead->id, 'data' => $lead->toArray()]);

        return response()->json(['message' => $message]);
    }


    public function update()
    {

    }

    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)
            ->get(["name", "id"]);

        return response()->json($data);
    }

    public function addTitle(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $title = PersonTitle::create(['title' => $request->title]);

        return response()->json([
            'id' => $title->id,
            'title' => $title->title,
        ]);
    }

    public function addTag(Request $request)
    {
        $request->validate([
            'tag' => 'required|string|max:255',
        ]);

        function randomColor()
        {
            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }

        $color = randomColor();

        $tag = Tag::create([
            'name' => $request->tag,
            'tage_type' => 2,
            'color' => $color
        ]); // 2 for lead

        return response()->json([
            'id' => $tag->id,
            'tag' => $tag->name,
            'color' => $tag->color,
        ]);
    }


    public function storeLead()
    {
        $response = Http::get('https://mapi.indiamart.com/wservce/crm/crmListing/v2/?glusr_crm_key=mRyxFrho4X7DQfer5nWJ7lGGpVPDmDU=');

        if ($response->successful()) {
            $leads = $response->json()['RESPONSE'];

            foreach ($leads as $leadData) {
                generate_lead::updateOrCreate(
                    ['id' => $leadData['ID'] ?? null],
                    [
                        'product_name' => $leadData['QUERY_PRODUCT_NAME'],
                        'probability' => $leadData['QUERY_TYPE'],
                        'company_name' => $leadData['SENDER_COMPANY'] ?? '',
                        'address_1' => $leadData['SENDER_ADDRESS'],
                        'city' => $leadData['SENDER_CITY'],
                        'state' => $leadData['SENDER_STATE'],
                        'country' => $leadData['SENDER_COUNTRY_ISO'],
                        'contact_name' => $leadData['SENDER_NAME'],
                        'email' => $leadData['SENDER_EMAIL'],
                        'mobile' => $leadData['SENDER_MOBILE'],
                        'lead_type' => '2',
                    ]
                );
            }

            return response()->json(['message' => 'Leads stored successfully']);
        }

        return response()->json(['message' => 'Failed to fetch leads'], 500);
    }

    public function show()
    {
        $leads = generate_lead::orderBy('id', 'desc')->with('getUser')->get();
        $currentUser = auth()->user();
        return view('lead.kanban', compact('leads', 'currentUser'));
    }

    public function updatePriority(Request $request)
    {
        // Find the lead and update its priority
        $lead = generate_lead::find($request->input('lead_id'));
        $lead->priority = $request->input('priority');
        $lead->save();

        return response()->json(['success' => true]);
    }

    public function calendar()
    {
        return view('lead.calendar');
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $exists = generate_lead::where('email', $email)->exists();

        return response()->json(['exists' => $exists]);
    }

    public function checkPhone(Request $request)
    {
        $phone = $request->input('phone');
        $exists = generate_lead::where('phone', $phone)->exists();

        return response()->json(['exists' => $exists]);
    }

    public function showSimilarLeads($productName)
    {
        // Fetch all leads with the same product_name
        $similarLeads = generate_lead::where('product_name', $productName)->get();

        // Return a view with the similar leads
        return view('lead.similar_lead', compact('similarLeads', 'productName'));
    }

    public function storeLost(Request $request)
    {

        $data = LostReason::create([
            'name' => $request->name,
        ]);

        return response()->json($data);
    }

    public function manageLostReasons(Request $request)
    {

        $data = generate_lead::where('id', $request->lead_id)->update([
            'lost_reason' => $request->lost_reasons,
            'closing_note' => $request->closing_notes,
            'is_lost' => 2
        ]);

        // return response()->json($data);
        return response()->json(['message' => 'Lead Lost successfully']);
    }



    public function scheduleActivityStore(Request $request)
    {
        try {
            // Create a new activity record
            $activity = new Activity();
            $activity->lead_id = $request->lead_id;
            $activity->activity_type = $request->activity_type;
            $activity->due_date = $request->due_date;
            $activity->summary = $request->summary;
            $activity->assigned_to = $request->assigned_to;
            $activity->note = $request->log_note;
            $activity->status = '0';
            $activity->save();

            // Redirect or return a response
            // return redirect()->back()->with('message', 'Activity scheduled successfully.');
            return response()->json(['message' => 'Activity scheduled successfully']);
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function activitiesEdit($id)
    {
        $activity = Activity::findOrFail($id);
        return response()->json(['activity' => $activity]);
    }

    public function activitiesUpdate(Request $request)
    {
        $data = $request->all();

        // Find the activity by ID and update it
        $activity = Activity::findOrFail($data['id']);
        $activity->activity_type = $data['activity_type'];
        $activity->due_date = $data['due_date'];
        $activity->summary = $data['summary'];
        $activity->assigned_to = $data['assigned_to'];
        $activity->note = $data['log_note'];
        $activity->save();

        return response()->json(['message' => 'Activity updated successfully']);
    }

    public function activitiesDelete($id)
    {
        $activity = Activity::find($id);

        if ($activity) {
            $activity->delete();
            return response()->json(['message' => 'Activity deleted successfully']);
        }

        return response()->json(['message' => 'Activity not found'], 404);
    }

    public function activitiesUpdateStatus(Request $request)
    {
        $activity = Activity::find($request['id']);
        $activity->status = '1';
        $activity->feedback = $request->feedback;
        $activity->save();

        return response()->json(['success' => true]);
    }

    public function fetchActivities()
    {
        // Fetch activities with the lead title relationship
        $activities = Activity::with('getLeadTitle')->where('status', '0')->get();

        // Format activities for FullCalendar
        $events = $activities->map(function ($activity) {
            // Ensure due_date is a Carbon instance
            $dueDate = Carbon::parse($activity->due_date);

            // Get lead title
            $leadTitle = $activity->getLeadTitle ? $activity->getLeadTitle->product_name : 'No Title';

            return [
                'id' => $activity->id,
                'lead_id' => $activity->lead_id,
                'title' => "{$leadTitle}", // Include lead title in the title
                'start' => $dueDate->toDateString(),
                'color' => 'blue', // This can be replaced with dynamic values if needed
                'description' => $activity->note,
            ];
        });

        // Return JSON response
        return response()->json($events);
    }

    public function activityDetail($id)
    {
        $activity = Activity::find($id);

        if (!$activity) {
            return response()->json(['error' => 'Activity not found'], 404);
        }

        $getUser = User::where('id', $activity->assigned_to)->first();
        $getEmail = $getUser ? $getUser->email : 'No email found'; // Safeguard against null
        $email = \Auth::user() ? \Auth::user()->email : 'No email found'; // Safeguard against null

        return response()->json([
            'activity_type' => $activity->activity_type,
            'created_at' => Carbon::parse($activity->created_at)->format('d/m/Y, H:i:s'),
            'email' => $email,
            'get_email' => $getEmail,
            'due_date' => $activity->due_date,
            'note' => $activity->note,
        ]);
    }

    public function filter(Request $request)
    {
        $selectedTags = $request->selectedTags;

        // Ensure $selectedTags is an array
        if (is_string($selectedTags)) {
            $selectedTags = explode(',', $selectedTags);
        }

        if (!is_array($selectedTags)) {
            return response()->json(['error' => 'Invalid tags format'], 400);
        }

        // Fetch all leads
        $leads = generate_lead::all();

        $mappedLeads = [];

        foreach ($leads as $lead) {
            $groupedLeads = &$mappedLeads;

            if (in_array('City', $selectedTags)) {
                $cityKey = isset($lead->city) ? $lead->city : 'None';
                $groupedLeads = &$groupedLeads[$cityKey];
            }

        
            if (in_array('Country', $selectedTags)) {
                $countryKey = isset($lead->country) ? $lead->country : 'None';
                $groupedLeads = &$groupedLeads[$countryKey];
            }


            if (in_array('Salesperson', $selectedTags)) {
                $salesPersonKey = isset($lead->sales_person) ? $lead->sales_person : 'None';
                $groupedLeads = &$groupedLeads[$salesPersonKey];
            }
            if (in_array('Sales Team', $selectedTags)) {
                $sales_teamKey = isset($lead->sales_team) ? $lead->sales_team : 'None';
                $groupedLeads = &$groupedLeads[$sales_teamKey];
            }

            $groupedLeads[] = $lead;
        }

        // Return the mapped data
        return response()->json(['data' => $mappedLeads]);
    }


}

