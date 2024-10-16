<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pricelist_all extends Model
{
    use HasFactory;

    protected $table = 'pricelist_alls';
    protected $fillable = [
        'pricelist_name',
        'country',
        'pricelistes_id',
    ];

    public function getCountry(){
        return $this->hasOne(Country::class,'id','country'); 
    }

    public function getPriceList()
{
    // Explode the comma-separated string into an array
    $priceListIDs = explode(',', $this->pricelistes_id);

    // Retrieve the related price_list_pop records
    return price_list_pop::whereIn('id', $priceListIDs)->get();
}

}   
