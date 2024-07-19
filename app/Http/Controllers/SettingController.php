<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function userIndex()
    {
        return view('settings.users.index');
    }

    public function usercreat()
    {
        return view('settings.users.creat');
    }
}
