<?php

namespace App\Models;

use App\Services\LogService;
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
        'expected_revenue',
        'priority',
        'probability',
        'deadline'
    ];

    protected $casts = [
        'priority' => 'string',
    ];


    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) {
           LogService::log($model , 'created', 'Sale created');
        });
    }

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

    public function logs()
    {
        return $this->morphMany(ChangeLog::class, 'loggable');
    }
}
