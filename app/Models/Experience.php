<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'employee_id',
        'start_date',
        'end_date',
        'type',
        'display_type',
        'description',
    ];
}
