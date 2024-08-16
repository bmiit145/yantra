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
}
