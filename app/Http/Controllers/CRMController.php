<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\CrmStage;
use App\Models\Opportunity;
use App\Models\Pipeline;

use App\Models\Sale;
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
            return view('CRM.view' , compact('stages'));
        }

        $sale = Sale::find($id);
        if ($sale == null) {
            return back()->with('error', 'Sale not found');
        }

        return view('CRM.view', compact('sale' , 'stages'));
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

    public function  newSales(Request $request)
    {
        $data = New Sale();
        $data->contact_id = $request->contact_id;
        $data->stage_id = $request->stage_id;
        $data->user_id = auth()->user()->id;
        $data->opportunity = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->expected_revenue = $request->expected_revenue;
        $data->priority = $request->priority ?? null;
        $data->probability = $request->probability ?? null;
        $data->deadline = $request->deadline ?? null;
        $data->save();

        if ($request->contact_id != null) {
            $contact = Contact::find($request->contact_id);
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->save();
        }

        if ($request->ajax()) {
            $res = [
                'status' => 'success',
                'message' => 'Sale created successfully',
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
        $sale = Sale::find($request->id);
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
