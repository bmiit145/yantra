<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value'];

    //get setting values
     function getSetting($key, $default)
    {
        $setting = Setting::where('key', $key)->first();
        if ($setting) {
            return (int) $setting->value;
        }

        return (int) env($key, $default);
    }
}


