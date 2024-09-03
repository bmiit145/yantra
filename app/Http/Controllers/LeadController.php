<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\generate_lead;
use App\Models\Opportunity;
use App\Models\PersonTitle;
use App\Models\Country;
use App\Models\state;
use App\Models\Tag;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LeadController extends Controller
{
    public function index($id = null)
    {


        $data = generate_lead::all();

        return view('lead.index', compact('data'));
    }

    public function create($id = null)
    {
        $titles = PersonTitle::all();
        $countrys = Country::all();
        $tags = Tag::where('tage_type', 2)->get();
        $data = generate_lead::find($id);
        $users = User::orderBy('id','DESC')->get();
        // $data = generate_lead::select('generate_lead.*', 
        //                              'countries.name as country_name', 
        //                              'states.name as state_name', 
        //                              'tags.name as tag_name', 
        //                              'person_titles.title as title_name')
        //     ->leftJoin('countries', 'generate_lead.country', '=', 'countries.id')
        //     ->leftJoin('states', 'generate_lead.state', '=', 'states.id')
        //     ->leftJoin('tags', 'generate_lead.tag_id', '=', 'tags.id')
        //     ->leftJoin('person_titles', 'generate_lead.title', '=', 'person_titles.id')
        //     ->first();

        return view('lead.creat', compact('titles', 'countrys', 'tags', 'data','users'));
    }


    // public function store(Request $request)
    // {
    //     if (isset($request->lead_id)) {
    //         $data = generate_lead::find($request->lead_id);

    //         $data->product_name = $request->name_0;
    //         $data->probability = $request->probability_0;
    //         $data->company_name = $request->partner_name_0;
    //         $data->address_1 = $request->street_0;
    //         $data->address_2 = $request->street2_0;
    //         $data->city = $request->city_0;
    //         $data->zip = $request->zip_0;
    //         $data->state = $request->state_id_0;
    //         $data->country = $request->country_id_0;
    //         $data->website_link = $request->website_0;
    //         $data->sales_person = $request->user_id_1;
    //         $data->sales_team = $request->team_id_0;
    //         $data->contact_name = $request->contact_name_0;
    //         $data->title = $request->title_0;
    //         $data->email = $request->email_from_1;
    //         $data->job_postion = $request->function_0;
    //         $data->phone = $request->phone_1;
    //         $data->mobile = $request->mobile_0;
    //         // $data->tag_id = $request->tag_ids_1;            
    //         // $data->tag_id = implode(',',$request->tag_ids_1);
    //         if ($request->has('tag_ids_1') && $request->tag_ids_1 !== null) {
    //             $data->tag_id = implode(',', $request->tag_ids_1);
    //         } else {
    //             $data->tag_id = null;
    //         }
    //         $data->lead_type = '1';
    //         $data->update();
    //         return response()->json(['message' => 'Data Updated Successfully']);
    //     }
    //     $data = new generate_lead;

    //     $data->product_name = $request->name_0;
    //     $data->probability = $request->probability_0;
    //     $data->company_name = $request->partner_name_0;
    //     $data->address_1 = $request->street_0;
    //     $data->address_2 = $request->street2_0;
    //     $data->city = $request->city_0;
    //     $data->zip = $request->zip_0;
    //     $data->state = $request->state_id_0;
    //     $data->country = $request->country_id_0;
    //     $data->website_link = $request->website_0;
    //     $data->sales_person = $request->user_id_1;
    //     $data->sales_team = $request->team_id_0;
    //     $data->contact_name = $request->contact_name_0;
    //     $data->title = $request->title_0;
    //     $data->email = $request->email_from_1;
    //     $data->job_postion = $request->function_0;
    //     $data->phone = $request->phone_1;
    //     $data->mobile = $request->mobile_0;
    //     // $data->tag_id = $request->tag_ids_1;
    //     // $data->tag_id = implode(',', $request->tag_ids_1);
    //     if ($request->has('tag_ids_1') && $request->tag_ids_1 !== null) {
    //         $data->tag_id = implode(',', $request->tag_ids_1);
    //     } else {
    //         $data->tag_id = null;
    //     }
    //     $data->lead_type = '1';
    //     $data->save();
    //     return response()->json(['message' => 'Data Added Successfully']);
    // }

    // public function store(Request $request)
    // {
    //     $data = generate_lead::updateOrCreate(
    //         ['id' => $request->lead_id],
    //         [
    //             'product_name' => $request->name_0,
    //             'probability' => $request->probability_0,
    //             'company_name' => $request->partner_name_0,
    //             'address_1' => $request->street_0,
    //             'address_2' => $request->street2_0,
    //             'city' => $request->city_0,
    //             'zip' => $request->zip_0,
    //             'state' => $request->state_id_0,
    //             'country' => $request->country_id_0,
    //             'website_link' => $request->website_0,
    //             'sales_person' => $request->user_id_1,
    //             'sales_team' => $request->team_id_0,
    //             'contact_name' => $request->contact_name_0,
    //             'title' => $request->title_0,
    //             'email' => $request->email_from_1,
    //             'job_postion' => $request->function_0,
    //             'phone' => $request->phone_1,
    //             'mobile' => $request->mobile_0,
    //             'tag_id' => $request->has('tag_ids_1') && $request->tag_ids_1 !== null ? implode(',', $request->tag_ids_1) : null,
    //             'lead_type' => '1',
    //         ]
    //     );

    //     // Log changes
    //     $action = $request->lead_id ? 'updated' : 'created';
    //     $message = $action === 'updated' ? 'Lead updated successfully' : 'Lead created successfully';

    //     Log::info($message, ['lead_id' => $data->id, 'data' => $data->toArray()]);

    //     return response()->json(['message' => $message]);
    // }

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
        return view('lead.kanban', compact('leads','currentUser'));
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

}

