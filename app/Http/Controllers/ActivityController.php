<?php

namespace App\Http\Controllers;
use App\Models\Activity;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
     public function index()
     {
        $activities = Activity::leftjoin('generate_lead', 'activities.lead_id', '=', 'generate_lead.id')
            ->select('activities.*', 'generate_lead.product_name', 'generate_lead.probability', 'activities.activity_type') // Assuming 'type' column holds activity type
            ->get()
            ->groupBy('lead_id');

            // $dueDate = \Carbon\Carbon::parse($activities->due_date);
            // $daysDiff = \Carbon\Carbon::now()->diffInDays($dueDate, false);
            // return $daysDiff;

    
         return view('lead.viewactivity', compact('activities'));
     }

     public function create()
     {
         return view('lead.createactivity');
     }
}
