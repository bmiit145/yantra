<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'job_title',
        'work_mobile',
        'department',
        'work_phone',
        'job_position',
        'work_email',
        'manager',
        'tags',
        'coach',
        'profile_image',
    ];
}
