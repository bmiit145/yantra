<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ContactAddress extends Model
{
    use HasFactory;
    protected $fillable = [
      'id', 'contact_id', 'address_1' , 'address_2', 'city', 'zip' , 'state', 'country'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function checkAddressChanges()
    {
        $this->refresh();

        // Log original and current data for debugging
        Log::info('Original Data:', $this->getOriginal());
        Log::info('Current Data:', $this->toArray());

        // Get the original and current complete addresses
        $originalAddress = $this->formatCompleteAddress($this->getOriginal());
        $currentAddress = $this->formatCompleteAddress($this->toArray());

        // Compare the addresses and return changes if different
        if ($originalAddress !== $currentAddress) {
            return [
                'old' => $originalAddress,
                'new' => $currentAddress,
            ];
        }

        return [];
    }

    public static function formatCompleteAddress($data)
    {
        // Ensure data has all necessary keys and defaults to empty string if not set
        $address1 = $data['address_1'] ?? '';
        $address2 = $data['address_2'] ?? '';
        $city = $data['city'] ?? '';
        $zip = $data['zip'] ?? '';
        $state = $data['state'] ?? '';
        $country = $data['country'] ?? '';

        return trim(implode(', ', array_filter([$address1, $address2, $city, $zip, $state, $country])));
    }

}
