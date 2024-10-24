<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_terms extends Model
{
    use HasFactory;
    protected $table = 'payment_terms';
    protected $fillable = [
        'name',
        'time', 
    ];
}
