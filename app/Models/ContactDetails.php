<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'contact_id', 'creat_contact', 'name','title','job_position','email','phone','mobile','internal_notes'];
}
