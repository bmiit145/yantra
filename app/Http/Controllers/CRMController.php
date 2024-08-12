<?php

namespace App\Http\Controllers;
use App\Models\Contact;
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
        if ($sale  == 'new'){
        $data = New Sale();
        }else{
            $data = Sale::findorfail($sale);
        }

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
        $data->save();

        if ($request->contact_id != null) {
            $contact = Contact::find($request->contact_id);

            $originalContact = $contact->getOriginal();
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->save();

            LogService::logChanges(['email', 'phone'], $originalContact, $contact->toArray(), $contact);
        }

        // Logs the changes
        $fields = ['opportunity', 'email', 'phone', 'expected_revenue', 'priority', 'probability', 'deadline'];

        $currentSale = $data->toArray();

        if ($data->wasChanged() && !empty($originalSale)) {
            LogService::logChanges($fields, $originalSale, $currentSale, $data);
        }

        if ($request->ajax()) {
                $msg = 'Sale updated successfully';
            if ($sale == 'new') {
                $msg = 'Sale created successfully';
            }
            $res = [
                'status' => 'success',
                'message' => $msg,
                'data' => $data
            ];
            return response()->json($res , 200);
        }
        return back()->with('success', 'Sale created successfully');
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




}
