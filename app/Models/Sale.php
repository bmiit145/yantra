<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_id',
        'stage_id',
        'user_id',
        'opportunity',
        'email',
        'phone',
        'expected_revenue',
        'priority',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function stage()
    {
        return $this->belongsTo(CrmStage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
