<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuotationsOrderLine extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'quotation_id','product_id','description','quantity','unit_price','taxes','tax_excl','tax_incl','notes','order_type'];
}
