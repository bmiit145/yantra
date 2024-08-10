<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillLevel extends Model
{
    use HasFactory;

    protected $table = 'skill_levels';
    
    protected $fillable = [
        'name',
        'level',
        'is_default',
        'skill_type_id',
    ];

    public function skillType()
    {
        return $this->belongsTo(SkillType::class , 'skill_type_id' , 'id');
    }
}
