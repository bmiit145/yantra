<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log as FacadesLog;

class generate_lead extends Model
{
    use HasFactory;
    protected $table = 'generate_lead';
    protected $fillable = ['product_name', 'probability', 'company_name','address_1','address_2',
                        'city','state','zip','country','website_link','sales_person','sales_team','contact_name',
                        'title','email','job_postion','phone','mobile','tag_id','priority','is_lost','lost_reason','closing_note','lead_type','campaign_id','medium_id','source_id','referred_by','assignment_date','closed_date'];


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
                'product_name', 'probability', 'company_name', 'address_1', 'address_2',
                'city', 'state', 'zip', 'country', 'website_link', 'sales_person', 'sales_team',
                'contact_name', 'title', 'email', 'job_postion', 'phone', 'mobile', 'tag_id', 'priority'
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

    public function logs()
    {
        return $this->morphMany(ChangeLog::class, 'loggable');
    }
    public function getCountry()
    {
        return $this->hasOne(Country::class,'id','country');
    }

    public function getAutoCountry()
    {
        return $this->hasOne(Country::class,'code','country');
    }

    public function getState()
    {
        return $this->hasOne(State::class,'id','state');
    }

    public function getAutoState()
    {
        return $this->hasOne(State::class,'name','state');
    }

    public function getTilte()
    {
        return $this->hasOne(PersonTitle::class,'id','title');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'id','tag_id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'sales_person', 'id');
    }

    public function title()
    {
        return $this->product_name; // or whatever method/attribute provides the title
    }

    public function activities()
    {
        return $this->hasMany(Activity::class,'lead_id','id');
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

}
