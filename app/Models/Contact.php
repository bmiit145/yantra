<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['id','image','name','address_id','GST_treatment','GSTIN','PAN','job_postion','phone','mobile','email','website','title','tages','is_user','is_parent' ];

}
