<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Attachment;
use App\Models\Campaign;
use App\Models\Medium;
use App\Models\Source;
use App\Models\Following;
use App\Models\User;
use App\Models\Employee;
use File;
use Illuminate\Http\Request;
use App\Models\generate_lead;
use App\Models\send_log_notes;
use App\Models\Opportunity;
use App\Models\PersonTitle;
use App\Models\Country;
use App\Models\State;
use App\Models\Tag;
use App\Models\Contact;
use App\Models\LostReason;
use App\Models\SaleTeam;
use App\Models\CrmStage;
use App\Models\send_message;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Services\EncryptionService;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Node\Block\Document;
use App\Mail\SendMessageMail;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function index($id = null)
    {
        // $data = generate_lead::with('tags')->get();
        $data = generate_lead::orderBy('id','DESC')->where('is_lost' ,'1')->get();

        // Filter out leads with unique product_name while preserving the first occurrence
        // $data = $datas->groupBy('product_name')->map(function ($group) {
        //     return $group->first();
        // });

        // return view('lead.index', compact('data'));
        $Countrs = Country::all();
        $tages = Tag::where('tage_type', 2)->get();
        $users = User::all();
        $customers = Contact::all();
        $Sources = Source::all();
        $CrmStages = CrmStage::all();
        $States = State::all();
        $PersonTitle = PersonTitle::all();
        $Campaigns = Campaign::all();
        return view('lead.index', compact('Countrs', 'data', 'tages', 'users', 'customers', 'Sources', 'CrmStages', 'States', 'PersonTitle', 'Campaigns'));
    }

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
        $query = generate_lead::where('is_lost', '1');

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
        $leads = $query->with('getCountry', 'getState', 'getAutoCountry', 'getAutoState', 'getUser', 'getTilte')->skip($skip)->take($pageLength)->get();

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
        $allData = generate_lead::where('product_name', $data->product_name)->count();
        // $getAllLeads = generate_lead::all(); // Use all() instead of get() for better readability

        // // Initialize an array to hold similar leads for each product
        // $similarLeadsCollection = [];

        // // Step 2: Loop through each lead to find similar leads
        // foreach ($getAllLeads as $lead) {
        //     if (isset($lead->product_name)) {
        //         $similarLeads = generate_lead::where('product_name', $lead->product_name)->count();
        //         $similarLeadsCollection[$lead->product_name] = $similarLeads;
        //     }
        // }
        // dd($similarLeadsCollection);
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
        $campaigns = Campaign::orderBy('id', 'DESC')->get();
        $mediums = Medium::orderBy('id', 'DESC')->get();
        $sources = Source::orderBy('id', 'DESC')->get();
        $lost_reasons = LostReason::all();
        $employees = Contact::all();
        $send_message = send_message::orderBy('id','DESC')->where('type_id', $id)->where('type', 'lead')->get();
        $log_notes = send_log_notes::with('user')->orderBy('id','DESC')->where('type_id', $id)->where('type', 'lead')->get();

        $followers = Following::where('type_id', $id)
        ->where('customer_id', '!=' , 'users/'.Auth::user()->id)
        ->where('type', '1')
        ->get()
        ->map(function($follower) {
            // Parse customer_id to determine if it's for Employee or User
            $customerParts = explode('/', $follower->customer_id);
            $entityType = $customerParts[0];
            $entityId = $customerParts[1];
    
            if ($entityType === 'employee') {
                // Fetch related employee details
                $employee = Contact::find($entityId);
                if ($employee) {
                    $follower->customer = $employee; 
                }
            } elseif ($entityType === 'users') {
                // Fetch related user details
                $user = User::find($entityId);
                if ($user) {
                    $follower->customer = $user; 
                }
            }
    
            return $follower;
        });

        // return $followers;

        $authfollowers = Following::where('type_id', $id)
        ->where('type', '1')
        ->where('customer_id', 'users/'.Auth::user()->id)
        ->get()
        ->map(function($follower1) {
            // Parse customer_id to determine if it's for Employee or User
            $customerParts = explode('/', $follower1->customer_id);
            $entityType = $customerParts[0];
            $entityId = $customerParts[1];
    
            if ($entityType === 'employee') {
                // Fetch related employee details
                $employee = Employee::find($entityId);
                if ($employee) {
                    $follower1->customer = $employee; 
                }
            } elseif ($entityType === 'users') {
                // Fetch related user details
                $user = User::find($entityId);
                if ($user) {
                    $follower1->customer = $user; 
                }
            }
    
            return $follower1;
        });

            $userId = Auth::user()->id;

        // Check if the current user is following the lead
        $isFollowing = Following::where('customer_id', 'users/' . $userId)
                                ->where('type_id', $id)
                                ->exists();

        $followerscount = $followers->count();
        $authfollowerscount = $authfollowers->count();
        $count = $followerscount + $authfollowerscount;

        $attachment = null;
        $fileCount = ''; // Initialize variable
        
        if ($data) { // Check if $data is not null
            $attachment = Attachment::where('type_id', $data->id)->first();
            
            if ($attachment) {
                $fileArray = explode(',', $attachment->files);
                $fileCount = count($fileArray);
            }
        } else {
        }

        $allFiles = []; // Initialize an array to hold file details

        if ($data) { // Check if $data is not null
            $attachmentFiles = Attachment::where('type_id', $data->id)->get();

            foreach ($attachmentFiles as $attachmentFile) {
                $fileArray = explode(',', $attachmentFile->files);
                $allFiles = array_merge($allFiles, $fileArray); // Merge all files into a single array
            }
        } else {
        }
        $sales_teams = SaleTeam::all();
     
        return view('lead.creat', compact('titles', 'countrys','sales_teams', 'tags','log_notes', 'data','authfollowers','followers','allData','users','employees', 'count', 'activitiesCount', 'activities', 'lost_reasons', 'activitiesDone', 'campaigns', 'mediums', 'sources','send_message','isFollowing','fileCount','allFiles'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $existingLead = generate_lead::find($request->lead_id);

        // Determine if sales_person has changed
        $salesPersonChanged = $existingLead && $existingLead->sales_person !== $request->sales_person;

        // Update or create the lead
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
                'campaign_id' => $request->campaign_id_0,
                'medium_id' => $request->medium_id_0,
                'source_id' => $request->source_id_0,
                'referred_by' => $request->referred_0,
                'assignment_date' => $salesPersonChanged ? now() : ($existingLead ? $existingLead->assignment_date : null),
                'internal_notes' => $request->internal_notes,
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

    public function addCampaign(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $campaign = Campaign::create(['name' => $request->name]);

        return response()->json([
            'id' => $campaign->id,
            'name' => $campaign->name,
        ]);
    }

    public function addMedium(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $medium = Medium::create(['name' => $request->name]);

        return response()->json([
            'id' => $medium->id,
            'name' => $medium->name,
        ]);
    }

    public function addSource(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $source = Source::create(['name' => $request->name]);

        return response()->json([
            'id' => $source->id,
            'name' => $source->name,
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
                        // 'probability' => $leadData['QUERY_TYPE'],
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
            if($request->action == 'schedule')            
            {
                $activity->lead_id = $request->lead_id;
                $activity->pipeline_id = $request->pipeline_id;
                $activity->activity_type = $request->activity_type;
                $activity->due_date = $request->due_date;
                $activity->summary = $request->summary;
                $activity->assigned_to = $request->assigned_to;
                $activity->note = $request->log_note;
                $activity->status = '0';
                $activity->save();
            }
            else if($request->action == 'done')
            {
                $activity->lead_id = $request->lead_id;
                $activity->pipeline_id = $request->pipeline_id;
                $activity->activity_type = $request->activity_type;
                $activity->due_date = $request->due_date;
                $activity->summary = $request->summary;
                $activity->assigned_to = $request->assigned_to;
                $activity->note = $request->log_note;
                $activity->status = '1';
                $activity->save();
            }

            else if($request->action == 'next')
            {
                $activity->lead_id = $request->lead_id;
                $activity->pipeline_id = $request->pipeline_id;
                $activity->activity_type = $request->activity_type;
                $activity->due_date = $request->due_date;
                $activity->summary = $request->summary;
                $activity->assigned_to = $request->assigned_to;
                $activity->note = $request->log_note;
                $activity->status = '1';
                $activity->save();
            }

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

    // calendar activity
    public function fetchActivities()
    {
        // Fetch activities with the lead title relationship
        $activities = Activity::with('getLeadTitle')->where('lead_id', '!=', null)->where('status', '0')->get();

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

    // Info activity
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
        $selectedTags = json_decode($request->input('selectedTags'), true);

        if (!is_array($selectedTags)) {
            return response()->json(['error' => 'Invalid tags format'], 400);
        }

        $leads = generate_lead::with(['getCountry', 'getAutoCountry', 'getState', 'getAutoState', 'getSource', 'getMedium', 'activities'])->get();
        $mappedLeads = [];

        foreach ($leads as $lead) {
            $currentGroup = &$mappedLeads;

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

                };

                if (!isset($currentGroup[$key])) {
                    $currentGroup[$key] = [];
                }
                $currentGroup = &$currentGroup[$key];
            }

            // Add lead to the last nested group
            $currentGroup[] = $lead;
        }

        function sortGroups(&$groups)
        {
            ksort($groups);
            foreach ($groups as &$subGroup) {
                if (is_array($subGroup)) {
                    sortGroups($subGroup);
                }
            }
        }

        sortGroups($mappedLeads);

        return response()->json(['data' => $mappedLeads]);
    }

    public function activities(Request $request)
    {
        // dd($request->all());
        // Get all tags from the request
        $tags = $request->tags ?? [];

        // Normalize tags to handle "Lost & Archived" as "Lost"
        $normalizedTags = array_map(function ($tag) {
            return $tag === 'Lost & Archived' ? 'Lost' : $tag;
        }, $tags);

        // Initialize variables to determine which filters to apply
        $includeMyActivities = in_array('My Activities', $normalizedTags);
        $includeUnassigned = in_array('Unassigned', $normalizedTags);
        $includeLost = in_array('Lost', $normalizedTags);

        // Late , Today and Future Activities 
        $includeLateActivities = in_array('Late Activities', $normalizedTags);
        $includeTodayActivities = in_array('Today Activities', $normalizedTags);
        $includeFutureActivities = in_array('Future Activities', $normalizedTags);

        // Start building the query
        $leadsQuery = generate_lead::query();

        // Apply filters based on specific tag combinations
        if ($includeLost) {
            // Apply the "Lost" filter
            $leadsQuery->where('is_lost', '2'); // Assuming '2' indicates "Lost"
        }

        if ($includeMyActivities || $includeUnassigned) {
            // Apply "My Activities" and/or "Unassigned" filters
            $leadsQuery->where(function ($query) use ($includeMyActivities, $includeUnassigned) {
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
            $leadsQuery->whereHas('activities', function ($query) use ($includeLateActivities, $includeTodayActivities, $includeFutureActivities) {
                // Initialize an array to hold the conditions
                $conditions = [];
        
                if ($includeLateActivities) {
                    $conditions[] = function($q) {
                        $q->where('due_date', '<', date('Y-m-d'))
                          ->where('status', 0); // Status for "My Activities"
                    };
                }
        
                if ($includeTodayActivities) {
                    $conditions[] = function($q) {
                        $q->where('due_date', '=', date('Y-m-d'))
                          ->where('status', 0); // Status for "My Activities"
                    };
                }
        
                if ($includeFutureActivities) {
                    $conditions[] = function($q) {
                        $q->where('due_date', '>', date('Y-m-d'))
                          ->where('status', 0); // Status for "My Activities"
                    };
                }
        
                // Apply all conditions using where(function)
                if (!empty($conditions)) {
                    $query->where(function ($subQuery) use ($conditions) {
                        foreach ($conditions as $condition) {
                            $subQuery->orWhere($condition);
                        }
                    });
                }
            });
        }

        // if (empty($normalizedTags)) {
        //     dd('dfdf');
        //     $leadsQuery->where('is_lost', '1'); // Change this as per your logic
        // }

        // Always include necessary relationships
        $leadsQuery->with('activities', 'getCountry', 'getAutoCountry', 'getState', 'getAutoState', 'getTilte', 'getUser');

        // Fetch results
        $generateLeads = $leadsQuery->get();

        // Return results as JSON
        return response()->json([
            'success' => true,
            'data' => $generateLeads
        ], 200);
    }


    public function customFilter(Request $request)
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
                $query->where(function($q) use ($operatesValue, $filterValue) {
                    $q->whereHas('getCountry', function($q) use ($operatesValue, $filterValue) {
                        $q->where('name', $operatesValue, $filterValue);
                    })
                    ->orWhereHas('getAutoCountry', function($q) use ($operatesValue, $filterValue) {
                        $q->where('name', $operatesValue, $filterValue);
                    });
                });
                break;
            case 'Zip':
                $query->where('zip', $operatesValue, $filterValue);
                break;
            case 'Tags':
                $query->whereHas('tags', function($q) use ($operatesValue, $filterValue) {
                    $q->where('name', $operatesValue, $filterValue);
                });
                break;
            case 'Created by':
                $createdByName = $filterValue;
                $user = User::where('name',$createdByName)->first();
                $query->whereHas('getUser', function($q) use ($operatesValue,$createdByName) {
                    $q->where('name', $operatesValue,$createdByName);
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
                $user = User::where('email',$salespersonId)->first();
                $query->whereHas('getUser', function($q) use ($operatesValue,$salespersonId) {
                    $q->where('email', $operatesValue,$salespersonId);
                });
                break;
            case 'Source':
                $query->whereHas('getSource', function($q) use ($operatesValue, $filterValue) {
                    $q->where('name', $operatesValue, $filterValue);
                });
                break;
            case 'Stage':
                $query->where('stage', $operatesValue, $filterValue);
                break;
            case 'State':
                $query->where(function($q) use ($operatesValue, $filterValue) {
                    $q->whereHas('getState', function($q) use ($operatesValue, $filterValue) {
                        $q->where('name', $operatesValue, $filterValue);
                    })
                    ->orWhereHas('getAutoState', function($q) use ($operatesValue, $filterValue) {
                        $q->where('name', $operatesValue, $filterValue);
                    });
                });
                break;
            case 'Street':
                $query->where('address_1', $operatesValue, $filterValue);
                break;
            case 'Street2':
                $query->where('address_1', $operatesValue, $filterValue);
                break;
            case 'Title':
                $query->whereHas('getTilte', function($q) use ($operatesValue, $filterValue) {
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
                $query->whereHas('getCampaign', function($q) use ($operatesValue, $filterValue) {
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
        // Execute the query and get results
        $query->with('activities', 'getCountry', 'getAutoCountry', 'getState', 'getAutoState', 'getTilte', 'getUser');
        // Fetch results
        $customFilter = $query->get();
        // dd($customFilter);
        // Return JSON response
        return response()->json([
            'success' => true,
            'data' => $customFilter
        ], 200);
    }


    // Upload Document Function
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048', // Adjust file validation as needed
            'activity_id' => 'required|integer',
        ]);

        $activityId = $request->input('activity_id');

        // Check if the file exists in the request
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            // Generate a unique filename
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Store the file in the 'uploads/upload_document' directory in storage
            $path = $file->storeAs('upload_document', $fileName,'public');

            // Update the database
            $activity = Activity::find($activityId);
            if ($activity) {
                $activity->status = 1; // Mark as completed
                $activity->document = $path; // Save only the file name
                $activity->save();

                return response()->json(['success' => true, 'message' => 'File uploaded successfully!']);
            }

            return response()->json(['success' => false, 'message' => 'Activity not found.']);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded.']);
    }

    public function deleteDocument(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:activities,id',
        ]);

        $activity = Activity::find($request->id);
        if ($activity) {
            // Specify the path to the document in storage
            $documentPath = storage_path('app/public/' . $activity->document);

            // Check if the file exists and delete it
            if (file_exists($documentPath)) {
                unlink($documentPath); // Delete the file from storage
            }

            // Set the document field to null and save the activity
            $activity->document = null;
            $activity->save();

            return response()->json(['success' => true, 'message' => 'Document deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Activity not found.']);
    }


    public function send_message(Request $request)
    {
        $data = new send_message();
        $data->message = $request->send_message;
        $data->to_mail = $request->to_mail;
        $data->type_id = $request->lead_id;
        $data->type = 'lead';
        $data->created_by = Auth::user()->id;
        $data->from_mail = auth()->user()->email;
        
        $uploadedFiles = []; // Array to hold the file paths
    
        if ($request->hasFile('image_uplode')) {
            foreach ($request->file('image_uplode') as $file) {
                // Get the original file name
                $fileName = time() . '_' . $file->getClientOriginalName();
    
                // Store the file in the 'public/uploads' directory
                $filePath = $file->storeAs('uploads', $fileName, 'public'); // Specify disk
    
                $uploadedFiles[] = $filePath; // Store the path
            }
    
            // Convert the array to a JSON string
            $data->image = json_encode($uploadedFiles);
        }
    
        $data->save();
    
        // Prepare message data
        $messageData = $request->send_message; 
        $recipientEmail = $request->to_mail;
    
        // Return JSON response immediately
        response()->json(['message' => 'Message sent successfully'])->send();
    
        // Defer the email sending until after the response
        $this->send_message_by_mail($uploadedFiles, $messageData, $recipientEmail);
        return null;
    }
    
    public function send_message_by_mail($uploadedFiles, $messageData, $recipientEmail)
    {
        $files = is_array($uploadedFiles) ? $uploadedFiles : [$uploadedFiles];
    
        // If $messageData is a string, wrap it in an array with a key
        if (!is_array($messageData)) {
            $messageData = ['content' => $messageData]; 
        }
    
        // Set a default message title
        $messageTitle = 'New Message';
    
        // Send the email after the response has been sent
        app()->terminating(function() use ($recipientEmail, $messageTitle, $files, $messageData) {
            Mail::send('mail.users.send_message', ['messageData' => $messageData, 'recipientEmail' => $recipientEmail], function ($message) use ($recipientEmail, $messageTitle, $files) {
                // Set recipient and subject
                $message->to($recipientEmail)
                        ->subject($messageTitle);
    
                // Attach files if they exist
                foreach ($files as $file) {
                    $fullPath = storage_path('app/public/' . $file); // Construct the full path
                    if (file_exists($fullPath)) {
                        $message->attach($fullPath);
                    } else {
                        Log::error("File does not exist: " . $fullPath);
                    }
                }
            });
        });
    }
    
    
    

    public function deleteImage(Request $request)
    {
       
        $messageId = $request->input('message_id');
        $imagePath = $request->input('image');
    
        // Fetch the record from the database
        $message = send_message::find($messageId);
    
        if (!$message) {
            return response()->json(['success' => false, 'message' => 'Message not found'], 404);
        }
    
        // Get the current image array
        $imageArray = json_decode($message->image);
    
        if (!$imageArray) {
            return response()->json(['success' => false, 'message' => 'No images found'], 404);
        }
    
        // Remove the image from storage
        Storage::disk('public')->delete($imagePath);
    
        // Filter out the image that was deleted from the array
        $updatedImageArray = array_filter($imageArray, function($img) use ($imagePath) {
            return $img !== $imagePath;
        });
    
        // Save the updated image array back to the database
        $message->image = json_encode(array_values($updatedImageArray)); // Re-index and encode
        $message->save();
    
        return response()->json(['success' => true]);
    }

    public function deleteImage1(Request $request)
    {
       
        $messageId = $request->input('message_id');
        $imagePath = $request->input('image');
    
        // Fetch the record from the database
        $message = send_log_notes::find($messageId);
    
        if (!$message) {
            return response()->json(['success' => false, 'message' => 'Message not found'], 404);
        }
    
        // Get the current image array
        $imageArray = json_decode($message->image);
    
        if (!$imageArray) {
            return response()->json(['success' => false, 'message' => 'No images found'], 404);
        }
    
        // Remove the image from storage
        Storage::disk('public')->delete($imagePath);
    
        // Filter out the image that was deleted from the array
        $updatedImageArray = array_filter($imageArray, function($img) use ($imagePath) {
            return $img !== $imagePath;
        });
    
        // Save the updated image array back to the database
        $message->image = json_encode(array_values($updatedImageArray)); // Re-index and encode
        $message->save();
    
        return response()->json(['success' => true]);
    }

    public function downloadAllImages($id)
    {
    
        $message = send_message::find($id); 

        // Get the images from the 'image' field
        $images = json_decode($message->image);

        // Create a temporary file for the zip
        $zipFileName = 'images_' . time() . '.zip';
        $zipFilePath = storage_path($zipFileName);

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            // Add each image to the zip
            foreach ($images as $image) {
                // Get the image path from the 'storage' directory
                $imagePath = storage_path('app/public/' . $image);
                if (file_exists($imagePath)) {
                    $zip->addFile($imagePath, basename($imagePath));  // Add image to the zip
                }
            }
            $zip->close();
        }

        // Return the zip file for download
        return response()->download($zipFilePath)->deleteFileAfterSend(true);  // Delete after sending
    }

    public function delete_send_message(Request $request)
    {
        $message = send_message::find($request->id);
        $message->delete();

        return response()->json(['message' => 'Message deleted successfully']);
    }

    public function click_star(Request $request)
{
    $lead = send_message::find($request->id);
    
    // Toggle the is_star status
    if ($request->is_star == '1') {
        $lead->is_star = '0'; // Unstar
    } else {
        $lead->is_star = '1'; // Star
    }
    
    $lead->save();

    return response()->json($lead);
}

    public function click_follow(Request $request)
{
    $leadId = $request->id;
    $userId = Auth::user()->id; // Current user ID

    // Check if the user is already following the lead
    $followRecord = Following::where('customer_id', 'users/' . $userId)
                            ->where('type_id', $leadId)
                            ->first();

    if ($followRecord) {
        // If the record exists, we are unfollowing
        $followRecord->delete();
        $isFollowing = false; // Update status
    } else {
        // If no record exists, we are following
        $newFollow = new Following();
        $newFollow->customer_id = 'users/' . $userId; // Ensure it references the user
        $newFollow->type_id = $leadId;
        $newFollow->type = 1; // Assuming '1' indicates a follow
        $newFollow->save();
        $isFollowing = true; // Update status
    }

    return response()->json([
        'isFollowing' => $isFollowing,
    ]);
}

public function invite_followers(Request $request)
{
    $leadId = $request->id;
    $userId = $request->user_id; // The ID of the user to be followed

    // Check if the user is already following the lead
    $existingFollow = Following::where('customer_id', $userId)
                                ->where('type_id', $leadId)
                                ->first();

    if ($existingFollow) {
        // If they are already following, delete the existing record
        $existingFollow->delete();
    }

    // Create a new follow record
    $newFollow = new Following();
    $newFollow->customer_id = $userId; // This is the new follower
    $newFollow->type_id = $leadId;
    $newFollow->type = 1; // Assuming '1' indicates a follow
    $newFollow->save();

    return redirect()->back()->with('success', 'Followers updated successfully.');
}

public function removeFollower(Request $request)
{
    $followerId = $request->id;

    // Find the follower record and delete it
    $followRecord = Following::find($followerId); // Assuming your id is unique and in the Following table

    if ($followRecord) {
        $followRecord->delete();
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false], 404);
}

public function attachmentsAdd(Request $request)
{
    $leadId = $request->input('lead_id');
    $storedFileNames = []; // Array to hold stored file names

    // Check if files are uploaded
    if ($request->hasFile('files')) {
        foreach ($request->file('files') as $file) {
            // Store file in 'uploads' directory under 'public' storage
            $path = $file->store('uploads/attachment', 'public'); 
            
            // Collect the stored file name (this is the name used in the folder)
            $storedFileNames[] = basename($path); // Use basename to get just the file name
        }

        // Fetch existing attachment record
        $attachment = Attachment::where('type_id', $leadId)->first();

        if ($attachment) {
            // If record exists, append new file names
            $existingFiles = explode(',', $attachment->files);
            $allFileNames = array_merge($existingFiles, $storedFileNames);
            $fileNamesImploded = implode(',', $allFileNames);
            // Update the existing record
            $attachment->update(['files' => $fileNamesImploded]);
        } else {           
            // If no record exists, create a new one
            $fileNamesImploded = implode(',', $storedFileNames);
            Attachment::create([
                'type_id' => $leadId,
                'type' => 1,
                'files' => $fileNamesImploded, // Store imploded string
            ]);
        }
    }

    return response()->json(['message' => 'Files uploaded successfully.']);
}

public function restore_lead(Request $request)
{
    $lead = generate_lead::where('id', $request->id)->update(['is_lost' => 1]);


    return response()->json($lead);
}

public function attachmentsDeleteFile(Request $request)
{
    $leadId = $request->input('lead_id'); // Get lead ID from request
    $fileNameToDelete = $request->input('file'); // Get file name from request

    // Find the attachment record by lead ID
    $attachment = Attachment::where('type_id', $leadId)->first();

    if ($attachment) {
        // Get the existing file names
        $existingFiles = explode(',', $attachment->files);

        // Remove the specified file
        $updatedFiles = array_filter($existingFiles, function($file) use ($fileNameToDelete) {
            return $file !== $fileNameToDelete;
        });

        // Delete the file from storage
        $filePath = 'uploads/attachment/' . $fileNameToDelete;
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }

        // Check if there are no files left
        if (empty($updatedFiles)) {
            // If no files left, delete the entire record
            $attachment->delete();
        } else {
            // Update the attachment record
            $attachment->files = implode(',', $updatedFiles);
            $attachment->save();
        }

        return response()->json(['success' => true, 'message' => 'File deleted successfully.']);
    }

    return response()->json(['success' => false, 'message' => 'Attachment not found.'], 404);
}

public function log_notes(Request $request)
{
    $data = new send_log_notes();
    $data->message = $request->send_message;
    $data->type_id = $request->lead_id;
    $data->type = 'lead';
    $data->created_by = Auth::user()->id;
    
    $uploadedFiles = []; // Array to hold the file paths

    if ($request->hasFile('image_uplode')) {
        foreach ($request->file('image_uplode') as $file) {
            // Get the original file name
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Store the file in the 'public/uploads' directory
            $filePath = $file->storeAs('uploads', $fileName, 'public'); // Specify disk

            $uploadedFiles[] = $filePath; // Store the path
        }

        // Convert the array to a JSON string
        $data->image = json_encode($uploadedFiles);
    }

    $data->save();
    return response()->json(['message' => 'Notes Add deleted successfully.']);

   
}
public function delete_send_message_notes(Request $request)
{
    $message = send_log_notes::find($request->id);
    $message->delete();

    return response()->json(['message' => 'Message deleted successfully']);
}

public function click_star_notes(Request $request)
{
$lead = send_log_notes::find($request->id);

// Toggle the is_star status
if ($request->is_star == '1') {
    $lead->is_start = '0'; // Unstar
} else {
    $lead->is_start = '1'; // Star
}

$lead->save();

return response()->json($lead);
}

public function downloadAllImagessend_message($id)
{

    $message = send_log_notes::find($id); 

    // Get the images from the 'image' field
    $images = json_decode($message->image);

    // Create a temporary file for the zip
    $zipFileName = 'images_' . time() . '.zip';
    $zipFilePath = storage_path($zipFileName);

    $zip = new ZipArchive;
    if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
        // Add each image to the zip
        foreach ($images as $image) {
            // Get the image path from the 'storage' directory
            $imagePath = storage_path('app/public/' . $image);
            if (file_exists($imagePath)) {
                $zip->addFile($imagePath, basename($imagePath));  // Add image to the zip
            }
        }
        $zip->close();
    }

    // Return the zip file for download
    return response()->download($zipFilePath)->deleteFileAfterSend(true);  // Delete after sending
}
   
}

