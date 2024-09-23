<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class send_message extends Model
{
    use HasFactory;
    protected $fillable = ['to_mail', 'from_mail', 'message', 'image', 'type_id', 'type'];
}
