<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillType extends Model
{
    use HasFactory;

    protected $table = 'skill_types';

    protected $fillable = ['name','user_id'];

    public function skills()
    {
        return $this->hasMany(Skill::class , 'skill_type_id' , 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
