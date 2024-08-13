<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\CrmSaleExtra;
use App\Models\CrmStage;
use App\Models\Opportunity;
use App\Models\Pipeline;

use App\Models\Sale;
use App\Services\LogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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





}
