<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'image',
        'name',
        'address_id',
        'GST_treatment',
        'GSTIN',
        'PAN',
        'job_postion',
        'phone',
        'mobile',
        'email',
        'website',
        'title',
        'tages',
        'is_user',
        'is_parent'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($contact) {
            $contact->ContactLog('created', 'Contact created' , $contact->is_user);
        });

//        static::updated(function ($contact) {
//            $originalData = $contact->getOriginal();
//            $changes = [];
//
//            // Define the fields you want to check for changes
//            $fields = ['name' , 'image', 'GSTIN',  'PAN', 'phone' , 'mobile', 'email', 'website' , 'tages'];
//
//            // Iterate over fields to check for changes
//            foreach ($fields as $field) {
//                if (isset($originalData[$field]) && $originalData[$field] != $contact->$field) {
//                    $changes[$field] = [
//                        'old' => $originalData[$field] ?? 'None',
//                        'new' => $contact->$field ?? 'None'
//                    ];
//                }
//            }
//
//
//            // Check if address has changed
//            if ($contact->address_id) {
//                $address = ContactAddress::find($contact->address_id);
//                $addressChanges = $address->checkAddressChanges();
//                if (!empty($addressChanges)) {
//                    $changes['address'] = $addressChanges;
//                }
//            }
//
//            // Debugging output
//            Log::info('Detected changes:', $changes);
//
//            // Create message only if there are changes
//            if (!empty($changes)) {
//                $message = json_encode($changes , JSON_PRETTY_PRINT);
//                // Log the contact update
//
//                $contact->ContactLog('updated', $message);
//            }
//        });

    }

    public function address()
    {
        return $this->belongsTo(ContactAddress::class);
    }

//    public function logs()
//    {
//        return $this->hasMany(ContactLog::class , 'contact_id' , 'id');
//    }

    public function logs()
    {
        return $this->morphMany(ChangeLog::class, 'loggable');
    }

    public function ContactLog($action, $message, $user_id = null, $attachments = null, $is_system = true)
    {
        $this->logs()->create([
            'loggable_id' => $this->id,
            'loggable_type' => get_class($this),
            'action' => $action,
            'message' => $message,
            'user_id' => $user_id ?? auth()->id(),
            'attachments' => $attachments ?? null,
            'is_system' => $is_system ?? true,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent')
        ]);
    }

}
