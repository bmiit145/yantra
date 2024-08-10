<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = ['name', 'sequence', 'skill_type_id'];

    public function skillType()
    {
        return $this->belongsTo(SkillType::class , 'skill_type_id' , 'id');
    }
}
