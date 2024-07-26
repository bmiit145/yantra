<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactAddress extends Model
{
    use HasFactory;
    protected $fillable = [
      'id', 'contact_id', 'address_1' , 'address_2', 'city', 'zip' , 'state', 'country'
    ];

}
