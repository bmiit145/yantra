<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        return view('Sale.orderindex');
    } 

    public function creat()
    {
        return view('Sale.ordernew');
    }
}
