<?php

namespace App\Http\Controllers;
use App\Models\Opportunity;
use App\Models\Pipeline;

use Illuminate\Http\Request;

class CRMController extends Controller
{
    public function index()
    {
        $data = Opportunity::all();
        $pipeline = Pipeline::all();
        return view('CRM.crmview_2', compact('data','pipeline'));
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

    public function newStage(Request $request)
    { 
        $newStage = $request->newStage;
        $data = New Pipeline;
        $data->title = $newStage;
        $data->save();
        return response()->json($data);
    }


}
