<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class optional_product extends Model
{
    use HasFactory;

    protected $table = 'products_new_items';
    protected $fillable = [
        'optional_product',
    ];
}