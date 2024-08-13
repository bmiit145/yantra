<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'action',
        'message',
        'user_id',
        'attachments',
        'is_system',
        'ip_address',
        'user_agent',
        'loggable_id',
        'loggable_type',
    ];

    // Define the polymorphic relationship
    public function loggable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
