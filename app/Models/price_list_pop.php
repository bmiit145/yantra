<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class price_list_pop extends Model
{
    use HasFactory;
    protected $table = 'price_list_pops';
    protected $fillable = [
        'apply_to',
        'product_Name',
        'category',
        'price_type',
        'discount',
        'sale_price_name',
        'based_price',
        'discount_sales',
        'markup',
        'other_pricelist',
        'round_of_to',
        'extra_fee',
        'fixed_price',
        'min_oty',
        'strat_date',
        'end_date',
    ];
}
