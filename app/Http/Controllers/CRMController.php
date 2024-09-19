<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\Campaign;
use App\Models\Contact;
use App\Models\Country;
use App\Models\CrmSaleExtra;
use App\Models\CrmStage;
use App\Models\Medium;
use App\Models\Opportunity;
use App\Models\PersonTitle;
use App\Models\Pipeline;

use App\Models\Sale;
use App\Models\Source;
use App\Models\Tag;
use App\Models\User;
use App\Services\LogService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class CRMController extends Controller
{
    public function index()
    {
        $data = Opportunity::all();
        $pipeline = Pipeline::all();
        return view('CRM.index', compact('data','pipeline'));
    }

    public function store(Request $request)
    {
        $data = New  Opportunity;
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
        $stages = CrmStage::where('user_id', auth()->user()->id)->orderBy('seq_no' , 'desc')->get();
        if ($id == 'new'){
            return view('CRM.view' , compact('stages'))->with('crm' , $id);
        }

        $sale = Sale::find($id);
        if ($sale == null) {
            return back()->with('error', 'Sale not found');
        }

        return view('CRM.view', compact('sale' , 'stages'))->with('crm' , $id);
    }

    public function newStage(Request $request)
    {
        $newStage = $request->newStage;
        $data = New CrmStage();
        $data->title = $newStage;
        $data->user_id = auth()->user()->id;
        $data->seq_no = CrmStage::where('user_id', auth()->user()->id)->max('seq_no') + 1;
        $data->save();
        return response()->json($data);
    }

    public function  newSales(Request $request , $sale)
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
            ] , 200);
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
        $sales = Sale::whereYear('deadline', $year)->whereMonth('deadline' , $month)->get();
        return response()->json(['sales' => $sales]);
    }

    public function pipelineList()
    {
        return view('CRM.crmlist');
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
        $query = Sale::query();

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
        $leads = $query->with('contact','getState','getCountry','user')->skip($skip)->take($pageLength)->get();

        return response()->json([
            "draw" => $request->draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            'data' => $leads
        ], 200);
    }


    public function pipelineCreate($id = null)
    {
        try{
            $data = Sale::find($id);
            $customers = Contact::all();
            $countrys = Country::all();
            $titles = PersonTitle::all();
            $campaigns = Campaign::orderBy('id', 'DESC')->get();
            $mediums = Medium::orderBy('id', 'DESC')->get();
            $sources = Source::orderBy('id', 'DESC')->get();
            $users = User::orderBy('id', 'DESC')->get();
            $tags = Tag::where('tage_type', 2)->get();
            if ($data && isset($data->product_name)) {
                $count = Sale::where('email', $data->product_name)->count();
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
            return view('CRM.pipeline_create',compact('data','titles','campaigns','mediums','sources','countrys','count','users','tags','activitiesCount','activities','activitiesDone','customers'));
        }catch(Exception $e){
            return redirect()->back()->with('error',value: 'Something went wrong!');
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
                'stage_id' => '2',
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


}
