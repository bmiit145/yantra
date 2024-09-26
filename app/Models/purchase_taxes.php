<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase_taxes extends Model
{
    use HasFactory;

    protected $table = 'purchase_taxes';
    protected $fillable = ['tax_name', 'tax_rate'];
}
