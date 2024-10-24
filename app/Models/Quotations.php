<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quotations extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'quotation_id','customer_id','gst_treatment','expiration_date','pricelist_id','Payment_terms','order_date','is_confirm','is_cancel','notes'];
}
