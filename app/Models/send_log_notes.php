<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class send_log_notes extends Model
{
    use HasFactory;
    protected $fillable = ['id','message', 'image', 'type', 'type_id','is_start'];

    public function user()
    {
        return $this->hasOne(User::class,'id','created_by');
    }
}
