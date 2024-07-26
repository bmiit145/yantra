<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FailedAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'attempts',
        'last_attempt_at',
        'locked_until',
    ];

}
