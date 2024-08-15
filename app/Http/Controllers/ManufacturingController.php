<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManufacturingController extends Controller
{
    public function index()
    {
        return view('manufacturing.index');
    }

    public function create()
    {
        return view('manufacturing.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function unbuild_order()
    {
        return view('manufacturing.unbuild_order');
    }

    public function scrap_order()
    {
        return view('manufacturing.scrap_order');
    }

    public function bills_of_material()
    {
        return view('manufacturing.bills_of_material');
    }

    public function production_analysis()
    {
        return view('manufacturing.production_analysis');
    }
}
