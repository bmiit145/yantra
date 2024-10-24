<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products_new_items extends Model
{
    use HasFactory;


    protected $table = 'products_new_items';


    protected $fillable = [
        'name',
        'image',
        'product_type',
        'track_inventory',
        'create on order',
        'invoicing_policy',
        'plan_servies',
        'sales_price',
        'cost_price',
        'reference',
        'barcode',
        'hsn_sac_code',
        'internal_note',
        'optional_product',
        'sales_des',
        'manufacture',
        'weight',
        'volume',
        'customer_lead_time',
        'res_des',
        'del_des',
        'income_ac',
        'expense_ac',
        'invoicing_policy_service_id',
        'sales_tax_id',
        'purchase_taxes',
        'category_id',
        'tags_id',
    ];

    public function sales_tax()
    {
        return $this->hasOne(sales_taxes::class,'id','sales_tax_id');
    }
}
