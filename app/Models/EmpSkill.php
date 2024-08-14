<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpSkill extends Model
{
    use HasFactory;

    protected $table = 'emp_skills';

    protected $fillable = [
        'id',
        'skill_id',
        'skill_type_id',
        'skill_level_id',
        'emp_id',
    ];
}
