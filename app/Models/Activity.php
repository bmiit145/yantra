<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    public function getLeadTitle()
    {
        return $this->hasOne(generate_lead::class, 'id', 'lead_id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

    public function getLead()
    {
        return $this->hasOne(generate_lead::class, 'id', 'lead_id');
    }

    public function getUserEmail()
    {
        return $this->hasOne(User::class, 'id', 'assigned_to');
    }
    
}
