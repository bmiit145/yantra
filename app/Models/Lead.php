<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_pricing',
        'probability',
        'company_name',
        'address',
        'address1',
        'city',
        'zip',
        'state',
        'country',
        'website',
        'salesperson',
        'sales_team',
        'contact_name',
        'email',
        'job_postition',
        'phone',
        'mobile',
        'tages',
        'internal_notes',
        'marketing_company',
        'marketing_campaign',
        'marketing_medium',
        'marketing_source',
        'marketing_referred_by',
        'marketing_assigment_date',
    ];
}
