<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecurringPlans extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_name',
        'months',
    ];
}
