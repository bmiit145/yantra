<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoicing_policies extends Model
{
    use HasFactory;
    protected $table = 'invoicing_policies';
    protected $fillable = ['invoice_name'];
}
