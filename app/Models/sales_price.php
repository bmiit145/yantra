<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales_price extends Model
{
    use HasFactory;
    protected $table = 'sales_prices';
    protected $fillable = [
        'sale_price_name',
        'sales_price_value',
    ];
}
