<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emp_private_info extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'address_1',
        'address_2',
        'city',
        'country',
        'state',
        'zip',
        'email',
        'phone',
        'bank_account_number',
        'language',
        'home_to_work_distance',
        'private_car_plate',
        'marital_status',
        'number_of_dependent_children',
        'emergency_contact_name',
        'emergency_phone',
        'certificate_level',
        'field_of_study',
        'school',
        'nationality',
        'identification_no',
        'ssn_no',
        'passport_no',
        'gender',
        'date_of_birth',
        'place_of_birth',
        'country_of_birth',
        'visa_no',
        'work_permit_no',
        'visa_expiration_date',
        'work_permit_expiration_date',
        'work_permit',
    ];
    
}
