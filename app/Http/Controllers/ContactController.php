<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('Contacts.index');
    }

    public function creat()
    {
        return view('Contact.creat');
    }
}
