<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class generate_lead extends Model
{
    use HasFactory;
    protected $table = 'generate_lead';
    protected $fillable = ['product_name', 'probability', 'company_name','address_1','address_2',
                        'city','state','zip','country','website_link','sales_person','sales_team','contact_name',
                        'title','email','job_postion','phone','mobile','tag_id','priority'];

    public function getCountry()
    {
        return $this->hasOne(Country::class,'id','country');
    }

    public function getState()
    {
        return $this->hasOne(State::class,'id','state');
    }

    public function getTilte()
    {
        return $this->hasOne(PersonTitle::class,'id','title');
    }

    public function getTag()
    {
        return $this->hasOne(Tag::class,'id','tag_id');
    }
}
