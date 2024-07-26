<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip',
        'user_agent',
        'login_at',
        'logout_at',
        'status',
        'device',
        'browser',
        'platform',
        'location',
        'country',
        'state',
        'city',
        'postal_code',
    ];
}
