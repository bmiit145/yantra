<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrmStage extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'is_won', 'is_lost', 'requirements' , 'user_id' , 'seq_no'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class , 'stage_id' , 'id');
    }
}
