<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emp_work_info extends Model
{
    use HasFactory;
    protected $fillable = ['emp_id', 'work_adddress', 'work_loaction', 'time_shit','working_hours','timezone','roles','default_role'];
}
