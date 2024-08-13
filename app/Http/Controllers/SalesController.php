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

    public function create()
    {
        return view('Sale.ordernew');
    }

    public function product_index()
    {
        return view('Sale.productindex');
    
    }
    public function product_create()
    {
        return view('Sale.productnew');
    }
    public function Pricelists_index()
    {
        return view('Sale.pricelistsindex');
    }
    public function Pricelists_create()
    {
        return view('Sale.Pricelistsnew');
    }
}
