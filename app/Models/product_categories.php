<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_categories extends Model
{
    use HasFactory;

        protected $table = 'product_categories';

        protected $fillable = ['categories_name', 'categories_image', 'parent_category'];
    
        public $timestamps = true;
}
