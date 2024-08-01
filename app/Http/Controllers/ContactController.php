<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactAddress;
use Illuminate\Support\Facades\Log;

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
        if (!$contact) {
            return view('errors.404', ['message' => 'Contact not found']);
//        abort(404 , 'Contact not found');
        }
        return view('Contacts.create' , compact('contact'));
    }

    public function create()
    {
        return view('Contacts.create');
    }

    public function save(Request $request , $is_user = null)
    {
            // Validate the request
        $request->validate([
            'contact_id' => 'sometimes',
            'contact_name' => 'required',
        ], [
            'contact_name.required' => 'Contact Name is required',
        ]);

        // Extract request data
        $data = $request->only([
            'contact_id', 'contact_name', 'gst_treatment', 'gstin', 'pan_number',
            'phone_number', 'mobile_number', 'contact_email', 'contact_Website',
            'contact_tages', 'address_1', 'address_2', 'address_city',
            'address_zip', 'address_state', 'country'
        ]);

        // Find or create contact
        $contact = Contact::find($data['contact_id']) ?? new Contact;
        $address = ContactAddress::where('contact_id', $contact->id)->first() ?? new ContactAddress;

        // Capture original data before update
        $originalContact = $contact->getOriginal();
        $originalAddress = $address->getOriginal();

        // Update contact details
        $contact->fill(
//            $data
            [
            'name' => $data['contact_name'],
            'GST_treatment' => $data['gst_treatment'],
            'GSTIN' => $data['gstin'],
            'PAN' => $data['pan_number'],
            'phone' => $data['phone_number'],
            'mobile' => $data['mobile_number'],
            'email' => $data['contact_email'],
            'website' => $data['contact_Website'],
            'tages' => $data['contact_tages'],
            'is_user' => $is_user,
            ]
        )->save();

        // Save address
        $address = ContactAddress::updateOrCreate(
            ['id' => $contact->address_id],
//            $data
            [
                'contact_id' => $contact->id,
                'address_1' => $data['address_1'],
                'address_2' => $data['address_2'],
                'city' => $data['address_city'],
                'zip' => $data['address_zip'],
                'state' => $data['address_state'],
                'country' => $data['country']
            ]
        );

        // Update contact with address ID
        $contact->update(['address_id' => $address->id]);

        // Get the updated values
        $currentContact = $contact->toArray();
        $currentAddress = $address->toArray();


        // Log changes if updated
        if ($contact->wasChanged() || $address->wasChanged()) {
            $this->logChanges($originalContact, $currentContact, $originalAddress, $currentAddress, $contact);
        }

        return response()->json(['action' => ''  , 'message' => 'Contact saved successfully' , 'contact' => $contact]);

    }


    protected function logChanges($originalContact, $currentContact, $originalAddress, $currentAddress, $contact)
    {
        // Detect changes in contact fields
        $contactFields = ['name', 'GSTIN', 'PAN', 'phone', 'mobile', 'email', 'website', 'tages'];

        $contactChanges = array_filter(array_combine($contactFields, array_map(function($field) use ($originalContact, $currentContact) {
            return isset($originalContact[$field]) && $originalContact[$field] != $currentContact[$field] ? [
                'old' => $originalContact[$field] ?? 'None',
                'new' => $currentContact[$field] ?? 'None'
            ] : null;
        }, $contactFields)));

        // Get the original and current complete addresses
        $mergeOriginalAddress = ContactAddress::formatCompleteAddress($originalAddress);
        $mergeCurrentAddress = ContactAddress::formatCompleteAddress($currentAddress);

        // Compare the addresses and return changes if different
        $addressChanges = $mergeOriginalAddress !== $mergeCurrentAddress ? [
            'address' => [
                'old' => $mergeOriginalAddress != '' ? $mergeOriginalAddress : 'None',
                'new' => $mergeCurrentAddress != '' ? $mergeCurrentAddress : 'None',
            ]
        ] : [];

        // Merge contact and address changes
        $changes = array_merge($contactChanges, $addressChanges);

        // Log changes if any
        if (!empty($changes)) {
            $message = json_encode($changes, JSON_PRETTY_PRINT);
            $contact->ContactLog('updated', $message);
            Log::info('Detected changes:', ['changes' => $changes]);
        }
    }

}
