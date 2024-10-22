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
        'deadline',
        'internal_notes',
        'company_name',
        'street_1',
        'street_2',
        'city',
        'state',
        'zip',
        'country',
        'website_link',
        'sales_person',
        'contact_name',
        'title',
        'email',
        'job_postion',
        'phone',
        'mobile',
        'tag',
        'campaign_id',
        'medium_id',
        'source_id',
        'referred_by',
        'description',
        'recurring_revenue',
        'recurring_plan',
        'is_lost',
        'is_side_colour'

    ];

    protected $casts = [
        'priority' => 'string',
    ];


    protected static function boot()
    {
        parent::boot();

        static::created(function ($lead) {
            $lead->logChanges('created', 'Lead created');
        });

        static::updated(function ($lead) {
            $originalData = $lead->getOriginal();
            $changes = [];

            $fields = [
                'opportunity', 'probability', 'company_name', 'street_1', 'street_2',
                'city', 'state', 'zip', 'country', 'website_link', 'sales_person',
                'contact_name', 'title', 'email', 'job_postion', 'phone', 'mobile', 'tag', 'priority'
            ];

            foreach ($fields as $field) {
                if (isset($originalData[$field]) && $originalData[$field] != $lead->$field) {
                    $changes[$field] = [
                        'old' => $originalData[$field] ?? 'None',
                        'new' => $lead->$field ?? 'None'
                    ];
                }
            }

            if (!empty($changes)) {
                $message = json_encode($changes, JSON_PRETTY_PRINT);
                $lead->logChanges('updated', $message);
            }
        });
    }

    public function logChanges($action, $message, $user_id = null, $attachments = null, $is_system = true)
    {
        $this->logs()->create([
            'loggable_id' => $this->id,
            'loggable_type' => get_class($this),
            'action' => $action,
            'message' => $message,
            'user_id' => $user_id ?? auth()->id(),
            'attachments' => $attachments ?? null,
            'is_system' => $is_system,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent')
        ]);
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

    public function  extra()
    {
        return $this->hasOne(CrmSaleExtra::class);
    }

    public function logs()
    {
        return $this->morphMany(ChangeLog::class, 'loggable');
    }

    public function getState()
    {
        return $this->hasOne(State::class,'id','state');
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class,'id','country');
    }

    public function getSource()
    {
        return $this->hasOne(Source::class, 'id', 'source_id');
    }

    public function getCampaign()
    {
        return $this->hasOne(Campaign::class, 'id', 'campaign_id');
    }

    public function getMedium()
    {
        return $this->hasOne(Medium::class, 'id', 'medium_id');
    }

    public function getRecurringPlan()
    {
        return $this->hasOne(RecurringPlans::class, 'id', 'recurring_plan');
    }

    public function salesPerson()
    {
        return $this->hasOne(User::class, 'id', 'sales_person');
    }

    public function tags()
    {
        $tagIds = explode(',', $this->tag); 
        return Tag::whereIn('id', $tagIds)->get();
        
    }

    public function Activities()
    {
        return $this->hasMany(Activity::class, 'pipeline_id', 'id')->where('status','0');
    }

    public function title()
    {
        return $this->hasOne(PersonTitle::class, 'id', 'title');
    }

   
}
