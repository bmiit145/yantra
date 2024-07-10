<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        return view('lead.index');
    }

    public function creat()
    {
        return view('lead.creat');
    }
}
