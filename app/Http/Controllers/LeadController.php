<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function index()
    {
       
        $data = Lead::all();
        return view('lead.index', compact('data'));
    }

    public function creat()
    {
        return view('lead.creat');
    }

    public function store(Request $request)
    {
        
        $data = New Lead;
        $data->product_pricing = $request->product_pricing;
        $data->probability = $request->probability;
        $data->company_name = $request->company_name;
        $data->address = $request->address;
        $data->website = $request->website;
        $data->salesperson = $request->salesperson;
        $data->sales_team = $request->sales_team;
        $data->contact_name = $request->contact_name;
        $data->email = $request->email;
        $data->job_postition = $request->job_postition;
        $data->phone = $request->phone;
        $data->mobile = $request->mobile;
        $data->tages = $request->tages;
        $data->internal_notes = $request->internal_notes;
        $data->marketing_company = $request->marketing_company;
        $data->marketing_campaign = $request->marketing_campaign;
        $data->marketing_medium = $request->marketing_medium;
        $data->marketing_source = $request->marketing_source;
        $data->marketing_referred_by = $request->marketing_referred_by;
        $data->marketing_assigment_date =$request->marketing_assigment_date;
        $data->save();
        return redirect('/lead');
        
    }
}
    