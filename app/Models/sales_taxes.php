<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales_taxes extends Model
{
    use HasFactory;
    protected $table = 'sales_taxes';
    protected $fillable = ['tax_name', 'tax_rate'];
}
