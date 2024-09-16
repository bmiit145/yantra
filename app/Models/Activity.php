<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'activity_type',
        'due_date',
        'summary',
        'assigned_to',
        'note',
        'status',
        'feedback',
        'document',
        'status_feedback'
    ];

    public function getLeadTitle()
    {
        return $this->hasOne(generate_lead::class, 'id', 'lead_id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }
}
