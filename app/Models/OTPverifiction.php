<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTPverifiction extends Model
{
    use HasFactory;
    protected $table = 'otp_verifications';

    protected $fillable = ['id', 'ip' , 'otp' , 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
