<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\Campaign;
use App\Models\Contact;
use App\Models\Country;
use App\Models\CrmSaleExtra;
use App\Models\CrmStage;
use App\Models\generate_lead;
use App\Models\LostReason;
use App\Models\Medium;
use App\Models\Opportunity;
use App\Models\PersonTitle;
use App\Models\Pipeline;

use App\Models\RecurringPlans;
use App\Models\Sale;
use App\Models\Source;
use App\Models\Tag;
use App\Models\User;
use App\Services\LogService;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Log;

class CRMController extends Controller
{
    public function index()
    {
        $data = Opportunity::all();
        $pipeline = Pipeline::all();
        $crmStages = CrmStage::with('sales.Activities')->orderBy('seq_no', 'desc')->get();
        

     
        return view('CRM.index', compact('data', 'pipeline', 'crmStages'));
    }

    public function store(Request $request)
    {
        $data = new Opportunity;
        $data->organization = $request->organization;
        $data->opportunity = $request->opportunity;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->expected_revenue = $request->expected_revenuel;
        $data->save();
        return back();
    }

                public function show($id)
    {
        $stages = CrmStage::where('user_id', auth()->user()->id)->orderBy('seq_no', 'desc')->get();
        if ($id == 'new') {
            return view('CRM.view', compact('stages'))->with('crm', $id);
        }

        $sale = Sale::find($id);
        if ($sale == null) {
            return back()->with('error', 'Sale not found');
        }

        return view('CRM.view', compact('sale', 'stages'))->with('crm', $id);
    }

    public function newStage(Request $request)
    {
        $newStage = $request->newStage;
        $data = new CrmStage();
        $data->title = $newStage;
        $data->user_id = auth()->user()->id;
        $data->seq_no = CrmStage::where('user_id', auth()->user()->id)->max('seq_no') + 1;
        $data->save();
        return response()->json($data);
    }

    public function newSales(Request $request, $sale)
    {
        $data = $sale == 'new' ? new Sale() : Sale::findOrFail($sale);
        // original
        $originalSale = $data->getOriginal();


        $data->contact_id = $request->contact_id;
        $data->stage_id = $request->stage_id ?? CrmStage::where('user_id', auth()->user()->id)->orderBy('seq_no')->first()->id;
        $data->user_id = auth()->user()->id;
        $data->opportunity = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->expected_revenue = $request->expected_revenue;
        $data->priority = $request->priority !== null ? $request->priority : null;
        $data->probability = $request->probability ?? null;
        $data->deadline = $request->deadline ?? null;
        $data->internal_notes = $request->internal_notes ?? null;
        $data->sales_person = auth()->user()->id;
        $data->save();

        if ($request->contact_id != null) {
            $contact = Contact::find($request->contact_id);
            $originalContact = $contact->getOriginal();
            $contact->update(['email' => $request->email, 'phone' => $request->phone]);

            //log
            LogService::logChanges(['email', 'phone'], $originalContact, $contact->toArray(), $contact);
        }


        // save the extra
        $extraData = [
            'sale_id' => $data->id,
            'company_name' => $request->company_name ?? null,
            'contact_name' => $request->contact_name ?? null,
            'person_title' => $request->person_title ?? null,
            'job_position' => $request->job_position ?? null,
            'mobile' => $request->mobile ?? null,
            'address_1' => $request->address_1 ?? null,
            'address_2' => $request->address_2 ?? null,
            'zip' => $request->zip ?? null,
            'city' => $request->city ?? null,
            'state' => $request->state_id ?? null,
            'country' => $request->country_id ?? null,
            'website' => $request->website ?? null,
            'campaign_id' => $request->campaign_id ?? null,
            'source_id' => $request->source_id ?? null,
            'medium_id' => $request->medium_id ?? null,
            'referred_by' => $request->referred_by ?? null,
            'sale_team_id' => $request->sale_team_id ?? null,
        ];
        $this->saveOrUpdateExtra($extraData, $data->id);

        // Logs the changes
        $fields = ['opportunity', 'email', 'phone', 'expected_revenue', 'priority', 'probability', 'deadline'];
        if ($data->wasChanged() && !empty($originalSale)) {
            LogService::logChanges($fields, $originalSale, $data->toArray(), $data);
        }

        if ($request->ajax()) {
            $msg = $sale == 'new' ? 'Sale created successfully' : 'Sale updated successfully';
            return response()->json([
                'status' => 'success',
                'message' => $msg,
                'data' => $data
            ], 200);
        }

        return back()->with('success', 'Sale created successfully');
    }

    public function saveOrUpdateExtra($data, $sale_id)
    {
        $saleExtra = CrmSaleExtra::firstOrNew(['sale_id' => $sale_id]);
        $saleExtra->fill($data)->save();
    }

    // sale
    public function setPriority(Request $request)
    {
        $sale = Sale::find($request->sale_id);
        $sale->priority = $request->priority;
        $sale->save();
        return response()->json($sale);
    }

    public function setStage(Request $request)
    {
        $sale = Sale::findorfail($request->id);
        $sale->stage_id = $request->stage_id;
        $sale->save();
        return response()->json($sale);
    }

    public function updateStageSequence(Request $request)
    {
        $stages = $request->stages;
        foreach ($stages as $key => $stage) {
            $data = CrmStage::find($stage['id']);
            $data->seq_no = $key;
            $data->save();
        }
        return response()->json($stages);
    }

    public function addActivityView()
    {
        return view('CRM.addactivity');
    }

    public function forecasting()
    {
        $crmStages = Auth::user()->crmStages->sortBy('seq_no');
        return view('CRM.forecast', compact('crmStages'));
    }

    public function updateDeadline(Request $request, $id)
    {



        $sale = Sale::findOrFail($id);
        $sale->deadline = \Carbon\Carbon::createFromFormat('Y-m', $request->deadline)->endOfMonth();
        $sale->save();

        return response()->json($sale);
    }

    public function getdedline($monthYear)
    {
        list($year, $month) = explode('-', $monthYear);
        $sales = Sale::whereYear('deadline', $year)->whereMonth('deadline', $month)->get();
        return response()->json(['sales' => $sales]);
    }

    public function pipelineList()
    {
        $data = Sale::all();
        return view('CRM.crmlist',compact('data'));
    }

    public function pipelineListData(Request $request)
    {
        // Page Length
        $pageNumber = ($request->start / $request->length) + 1;
        $pageLength = $request->length;
        $skip = ($pageNumber - 1) * $pageLength;

        // Page Order
        $orderColumnIndex = $request->order[0]['column'] ?? '0';
        $orderBy = $request->order[0]['dir'] ?? 'desc';

        // Build Query
        $query = Sale::where('is_lost', '1');

        // Search
        $searchValue = $request->search['value'] ?? '';
        if ($searchValue) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('opportunity', 'like', "%{$searchValue}%")
                    ->orWhere('email', 'like', "%{$searchValue}%")
                    ->orWhere('phone', 'like', "%{$searchValue}%")
                    ->orWhere('expected_revenue', 'like', "%{$searchValue}%")
                    ->orWhere('deadline', 'like', "%{$searchValue}%");
            });
        }

        // Determine Order By Column
        $orderByName = 'opportunity';
        switch ($orderColumnIndex) {
            case '0':
                $orderByName = 'opportunity';
                break;
            case '1':
                $orderByName = 'email';
                break;
            case '2':
                $orderByName = 'phone';
                break;
            case '3':
                $orderByName = 'expected_revenue';
                break;
            // Add more cases as needed
            default:
                $orderByName = 'opportunity';
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
        $leads = $query->with('contact', 'getState', 'getCountry', 'user', 'getSource', 'getCampaign', 'getMedium', 'getRecurringPlan')->skip($skip)->take($pageLength)->get();

        return response()->json([
            "draw" => $request->draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            'data' => $leads
        ], 200);
    }


    public function pipelineCreate($id = null)
    {        
        try {
            $data = Sale::find($id);
            $customers = Contact::all();
            $countrys = Country::all();
            $titles = PersonTitle::all();
            $campaigns = Campaign::orderBy('id', 'DESC')->get();
            $mediums = Medium::orderBy('id', 'DESC')->get();
            $sources = Source::orderBy('id', 'DESC')->get();
            $users = User::orderBy('id', 'DESC')->get();
            $tags = Tag::where('tage_type', 2)->get();
            $crmStages = CrmStage::orderBy('id', 'DESC')->get();
            $recurringPlans = RecurringPlans::all();
            $lost_reasons = LostReason::all();
            if ($data) {
                $isWon = $data->stage_id;
            } else {
                $isWon = '';
            }
            $checkIsWon = CrmStage::where('id', $isWon)->first();
            if ($data && isset($data->product_name)) {
                $count = Sale::where('email', $data->product_name)->count();
            } else {
                $count = 0;
            }
            if ($data) {
                $activitiesCount = Activity::where('pipeline_id', $data->id)->where('status', '0')->count();
            } else {
                $activitiesCount = 0;
            }
            if ($data) {
                $activities = Activity::orderBy('id', 'DESC')->where('status', '0')->where('pipeline_id', $data->id)->get();
            } else {
                $activities = 0;
            }
            if ($data) {
                $activitiesDone = Activity::orderBy('id', 'DESC')->where('status', '1')->where('pipeline_id', $data->id)->get();
            } else {
                // $activitiesDone = 0;
                $activitiesDone = collect();
            }
            return view('CRM.pipeline_create', compact('data', 'titles', 'campaigns', 'mediums', 'sources', 'countrys', 'count', 'users', 'tags', 'activitiesCount', 'activities', 'activitiesDone', 'customers', 'recurringPlans', 'crmStages', 'checkIsWon', 'lost_reasons'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', value: 'Something went wrong!');
        }
    }

    public function pipelineStore(Request $request)
    {
        // dd($request->all());
        // $existingLead = Sale::find($request->lead_id);

        // // Determine if sales_person has changed
        // $salesPersonChanged = $existingLead && $existingLead->sales_person !== $request->sales_person;

        // Update or create the lead
        $pipeline = Sale::updateOrCreate(
            ['id' => $request->pipeline_id],
            [
                'opportunity' => $request->name_0,
                'probability' => $request->probability_0,
                'company_name' => $request->partner_name_0,
                'contact_id' => $request->customer_select,
                'street_1' => $request->street_0,
                'street_2' => $request->street2_0,
                'city' => $request->city_0,
                'zip' => $request->zip_0,
                'state' => $request->state_id_0,
                'country' => $request->country_id_0,
                'website_link' => $request->website_0,
                'sales_person' => $request->sales_person,
                'sales_team' => $request->team_id_0,
                'contact_name' => $request->contact_name_0,
                'title' => $request->title_0,
                'expected_revenue' => $request->expected_revenue_0,
                'recurring_revenue' => $request->recurring_revenue_0,
                'deadline' => $request->date_deadline_0,
                'recurring_plan' => $request->recurring_plan_0,
                'email' => $request->email_from_1,
                'job_postion' => $request->function_0,
                'phone' => $request->phone_1,
                'mobile' => $request->mobile_0,
                'tag' => $request->has('tag_ids_1') && $request->tag_ids_1 !== null ? implode(',', $request->tag_ids_1) : null,
                'priority' => $request->priority,
                'campaign_id' => $request->campaign_id_0,
                'medium_id' => $request->medium_id_0,
                'source_id' => $request->source_id_0,
                'referred_by' => $request->referred_0,
                'description' => $request->description,
                'stage_id' => $request->selected_stage_id,
                'is_lost' => '1',
                'user_id' => Auth::user()->id,
            ]
        );

        // Log changes
        $action = $request->pipeline_id ? 'updated' : 'created';
        $message = $action === 'updated' ? 'Pipeline updated successfully' : 'Pipeline created successfully';

        // Fetch the original data if it's an update
        if ($request->pipeline_id) {
            $originalData = Sale::find($request->pipeline_id)->getOriginal();
            $changes = [];

            // Define the fields you want to check for changes
            $fields = ['opportunity', 'probability', 'company_name', 'street_1', 'street_2', 'city', 'state', 'zip', 'country', 'website_link', 'sales_person', 'contact_name', 'title', 'email', 'job_postion', 'phone', 'mobile', 'tag'];

            // Iterate over fields to check for changes
            foreach ($fields as $field) {
                if (isset($originalData[$field]) && $originalData[$field] != $pipeline->$field) {
                    $changes[$field] = [
                        'old' => $originalData[$field] ?? 'None',
                        'new' => $pipeline->$field ?? 'None'
                    ];
                }
            }

            // Create message only if there are changes
            if (!empty($changes)) {
                $message .= '. Changes: ' . json_encode($changes, JSON_PRETTY_PRINT);
            }
        }

        Log::info($message, ['pipeline_id' => $pipeline->id, 'data' => $pipeline->toArray()]);

        return response()->json(['message' => $message]);
    }

    public function getCustomerDetails($id)
    {
        // Fetch customer by ID
        $customer = Contact::find($id);

        if ($customer) {
            return response()->json([
                'email' => $customer->email,
                'phone' => $customer->phone
            ]);
        } else {
            return response()->json([
                'error' => 'Customer not found'
            ], 404);
        }
    }

    public function updateStage(Request $request)
    {
        // Check if the stage title is "Won"
        if ($request->stage_id === 'Won') {
            // Retrieve the ID of the "Won" stage from CrmStage
            $wonStage = CrmStage::where('title', 'Won')->first();

            if ($wonStage) {
                // Set the stage ID to the "Won" stage ID
                $request->merge(['stage_id' => $wonStage->id]);
            } else {
                // Return an error if "Won" stage is not found
                return response()->json(['success' => false, 'message' => 'Won stage not found'], 404);
            }
        }

        // Find the pipeline (Sale) by its ID
        $pipeline = Sale::find($request->pipeline_id);

        // If pipeline exists, update the stage_id
        if ($pipeline) {
            $pipeline->stage_id = $request->stage_id;
            $pipeline->save();

            return response()->json(['success' => true]);
        }

        // If pipeline is not found, return an error response
        return response()->json(['success' => false, 'message' => 'Pipeline not found'], 404);
    }

    public function addLostReason(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $lostReason = LostReason::create(['name' => $request->name]);

        return response()->json([
            'id' => $lostReason->id,
            'name' => $lostReason->name,
        ]);
    }

    public function pipelineManageLostReasons(Request $request)
    {
        $data = Sale::where('id', $request->pipeline_id)->update([
            'lost_reason' => $request->lost_reasons,
            'closing_note' => $request->closing_notes,
            'is_lost' => 2
        ]);

        // return response()->json($data);
        return response()->json(['message' => 'Pipeline Lost successfully']);
    }

    public function restoreIsLost(Request $request, $id)
    {
        $data = Sale::find($id);
        if ($data) {
            $data->is_lost = $request->input('is_lost');
            $data->lost_reason = null;
            $data->closing_note = null;
            $data->save();

            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }

    public function pipelineScheduleActivityStore(Request $request)
    {
        try {
            // Create a new activity record
            $activity = new Activity();
            $activity->pipeline_id = $request->pipeline_id;
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
        } catch (Exception $e) {
            return redirect()->back();
        }
    }


    public function pipelineActivitiesEdit($id)
    {
        $activity = Activity::findOrFail($id);
        return response()->json(['activity' => $activity]);
    }

    public function pipelineActivitiesUpdate(Request $request)
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

    public function pipelineActivitiesDelete($id)
    {
        $activity = Activity::find($id);

        if ($activity) {
            $activity->delete();
            return response()->json(['message' => 'Activity deleted successfully']);
        }

        return response()->json(['message' => 'Activity not found'], 404);
    }

    public function pipelineActivitiesUpdateStatus(Request $request)
    {
        $activity = Activity::find($request['id']);
        $activity->status = '1';
        $activity->feedback = $request->feedback;
        $activity->save();

        return response()->json(['success' => true]);
    }

    public function calendar()
    {
        return view('CRM.calendar');
    }

    // calendar activity
    public function pipelinefetchActivities()
{
    // Fetch activities with the lead title relationship
    $activities = Activity::with('getPipelineLeadTitle', 'getPipelineLeadTitle.contact')
        ->where('pipeline_id', '!=', null)
        ->where('status', '0')
        ->get();

    // Format activities for FullCalendar
    $events = $activities->map(function ($activity) {
        // Ensure due_date is a Carbon instance
        $dueDate = Carbon::parse($activity->due_date);

        // Initialize variables for lead title, customer, and expected revenue
        $pipelineTitle = 'No Opportunity';
        $pipelineCustomer = 'No Customer';
        $pipelineRevanue = 'No Expected Revenue';

        // Check if getPipelineLeadTitle is not null
        if ($activity->getPipelineLeadTitle) {
            $pipelineTitle = $activity->getPipelineLeadTitle->opportunity;
            $pipelineCustomer = $activity->getPipelineLeadTitle->contact ? $activity->getPipelineLeadTitle->contact->name : 'No Customer';
            $pipelineRevanue = $activity->getPipelineLeadTitle->expected_revenue;
        }

        return [
            'id' => $activity->id,
            'pipeline_id' => $activity->pipeline_id,
            'title' => $pipelineTitle, // Include lead title in the title
            'customer' => $pipelineCustomer,
            'expected_revenue' => $pipelineRevanue,
            'start' => $dueDate->toDateString(),
            'color' => 'blue', // This can be replaced with dynamic values if needed
            'description' => $activity->note,
        ];
    });

    // Return JSON response
    return response()->json($events);
}

    // Info activity
    public function pipelineactivityDetail($id)
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

    public function pipelineActivity()
    {
        // Retrieve activities associated with pipeline_id only and exclude those with a lead_id
        $activities = Activity::leftJoin('sales', 'activities.pipeline_id', '=', 'sales.id')
            ->select('activities.*', 'sales.opportunity', 'sales.probability', 'activities.activity_type')
            ->whereNull('activities.lead_id') // Exclude records where lead_id is not null
            ->get()
            ->groupBy('pipeline_id');
    
        $users = User::all();
        $currentUser = auth()->user();
        
        // Debugging: Uncomment to see the activities
        // dd($activities);
    
        return view('CRM.viewactivity', compact('activities', 'users', 'currentUser'));
    }
    
    public function pipelineGraph()
{
    // Fetch sales data grouped by stage_id and sales_person, including user details
    $salesData = Sale::with('salesPerson') // Eager load the user relationship
        ->select('stage_id', 'sales_person', DB::raw('count(*) as total'))
        ->groupBy('stage_id', 'sales_person')
        ->get();

    // Fetch all stages and key by ID
    $stages = CrmStage::all()->keyBy('id'); 

    // Prepare datasets for the chart
    $datasets = [];
    
    foreach ($salesData as $data) {
        if (!isset($stages[$data->stage_id])) {
            error_log("Stage ID not found: " . $data->stage_id);
            continue;
        }

        $user = $data->salesPerson; // Correctly reference the salesPerson relationship
        $userName = $user->name ?? 'Unknown User'; 
        $userEmail = $user->email ?? 'No Email'; // Fetch user email
        $userColor = $this->getUserColor($data->sales_person);

        // Ensure unique entries for each stage and user
        $datasets[$data->stage_id]['data'][$data->sales_person] = [
            'label' => "$userName ($userEmail)", // Combine name and email for the label
            'total' => $data->total,
            'backgroundColor' => $userColor,
        ];
    }

    return view('CRM.graph', compact('datasets', 'stages'));
}

private function getUserColor($userId)
{
    $userId = abs((int)$userId);

    // Colors with full transparency (alpha set to 0)
    $colors = [
        'rgba(255, 99, 132, 0.5)',  // Transparent red
        'rgba(54, 162, 235, 0.5)',  // Transparent blue
        'rgba(255, 206, 86, 0.5)',  // Transparent yellow
        'rgba(75, 192, 192, 0.5)',  // Transparent teal
        'rgba(153, 102, 255, 0.5)', // Transparent purple
        'rgba(255, 159, 64, 0.5)',  // Transparent orange
        'rgba(201, 203, 207, 0.5)', // Transparent gray
        'rgba(255, 99, 71, 0.5)',   // Transparent tomato
        'rgba(60, 179, 113, 0.5)',  // Transparent mediumseagreen
        'rgba(255, 20, 147, 0.5)',  // Transparent deeppink
        'rgba(100, 149, 237, 0.5)', // Transparent cornflower blue
        'rgba(255, 165, 0, 0.5)',   // Transparent orange
        'rgba(124, 252, 0, 0.5)',   // Transparent lawn green
        'rgba(255, 105, 180, 0.5)', // Transparent hot pink
        'rgba(186, 85, 211, 0.5)'   // Transparent medium orchid
    ];

    $index = $userId % count($colors);

    error_log("User ID: $userId, Calculated Index: $index, Colors Count: " . count($colors));

    if ($index < 0 || $index >= count($colors)) {
        error_log("Index out of bounds: $index");
        return 'rgba(0, 0, 0, 0)'; // Fully transparent black as default
    }

    return $colors[$index];
}

    public function setColor(Request $request)
    {
        $sale = Sale::find($request->sale_id);
        if ($sale) {
            $sale->is_side_colour = $request->color; // Update color
            $sale->save();  // Save the change

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function pipelineDelete(Request $request)
    {
        $sale = Sale::find($request->sale_id);
        if ($sale) {
            $sale->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }






}
