<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\generate_lead;
use App\Models\PersonTitle;
use App\Models\Country;
use App\Models\state;
use App\Models\Tag;

class LeadController extends Controller
{
    public function index()
    {
       
        $data = generate_lead::all();
        return view('lead.index', compact('data'));
    }

    public function create()
    {
        $title = PersonTitle::all();
        $countrys = Country::all();
        $tags = Tag::all();
        return view('lead.creat', compact('title','countrys','tags'));
    }
    
    public function store(Request $request)
    {
        // dd($request->all());
        $data = New generate_lead;
        $data->product_name = $request->name_0;
        $data->probability = $request->probability_0;
        $data->company_name = $request->partner_name_0;
        $data->address_1 = $request->street_0;
        $data->address_2 = $request->street2_0;
        $data->city = $request->city_0;
        $data->zip = $request->zip_0;
        $data->state = $request->state_id_0;
        $data->country = $request->country_id_0;
        $data->website_link = $request->website_0;    
        $data->sales_person = $request->user_id_1;
        $data->sales_team = $request->team_id_0;
        $data->contact_name = $request->contact_name_0;
        $data->title = $request->title_0;
        $data->email = $request->email_from_1;
        $data->job_postion = $request->function_0;
        $data->phone = $request->phone_1;
        $data->mobile = $request->mobile_0;
        $data->tag_id = $request->tag_ids_1;
        $data->save();
        return response()->json(['success' => 'Data Added Successfully']);
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

        $tag = Tag::create(['name' => $request->tag]);

        return response()->json([
            'id' => $tag->id,
            'tag' => $tag->name,
        ]);
    }

}

    