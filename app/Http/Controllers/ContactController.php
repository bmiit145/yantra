<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactAddress;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('Contacts.index' , compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('Contacts.create' , compact('contact'));
    }


    public function create()
    {
        return view('Contacts.create');
    }

    public function save(Request $request)
    {
        // validate the request
        $request->validate([
            'contact_name' => 'required',
        ],
        [
            'contact_name.required' => 'Contact Name is required',
        ]);

       $contact_name = $request->contact_name;
       $gst_treatment = $request->gst_treatment;
       $gstin = $request->gstin;
       $pan_number = $request->pan_number;
       $phone_number = $request->phone_number;
       $mobile_number = $request->mobile_number;
       $contact_email = $request->contact_email;
       $contact_Website = $request->contact_Website;
       $contact_tages = $request->contact_tages;
       $address_1 = $request->address_1;
       $address_2 = $request->address_2;
       $address_city = $request->address_city;
       $address_zip = $request->address_zip;
       $address_state = $request->address_state;
       $country = $request->country;

       $data = new Contact;
       $data->name = $contact_name;
       $data->GST_treatment = $gst_treatment;
       $data->GSTIN = $gstin;
       $data->PAN = $pan_number;
       $data->phone = $phone_number;
       $data->mobile = $mobile_number;
       $data->email = $contact_email;
       $data->website = $contact_Website;
       $data->tages = $contact_tages;
       $data->save();

       $address = new ContactAddress;
       $address->contact_id = $data->id;
       $address->address_1 = $address_1;
       $address->address_2 = $address_2;
       $address->city = $address_city;
       $address->zip = $address_zip;
       $address->state = $address_state;
       $address->country = $country;
       $address->save();

       $id = $data->id;
       $data = Contact::find($id);
       $data->address_id = $address->id;
       $data->update();

       return response()->json($data);

    }

}
