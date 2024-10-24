<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuotationsOtherInfo extends Model
{
    use HasFactory;
     protected $fillable = ['id', 'quotation_id','sales_person','sales_team','online_signature','online_payment','online_payment_pr','customer_ref','tag_id','fiscal_position',
        'analytic_account','incoterm','incoterm_location','shipping_policy','delivery_date','source_document','opportunity_id','campaign_id','medium_id','source_id'];
}
