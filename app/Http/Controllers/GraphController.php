<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\generate_lead;
use Illuminate\Support\Facades\Auth;

class GraphController extends Controller
{
    public function index()
    {
        $data = generate_lead::where('is_lost', 1)
        ->where('sales_person', Auth::user()->id)
        ->selectRaw('sales_person, COUNT(*) as lead_count')
        ->groupBy('sales_person')
        ->get();
   
        return view('lead.graph', compact('data'));
    }
}
