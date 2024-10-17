<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'lead_id',
        'activity_type',
        'due_date',
        'summary',
        'assigned_to',
        'note',
        'status',
        'feedback',
        'document',
        'status_feedback'
    ];

    public function getLeadTitle()
    {
        return $this->hasOne(generate_lead::class, 'id', 'lead_id');
    }

    public function getPipelineLeadTitle()
    {
        return $this->hasOne(Sale::class, 'id', 'pipeline_id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
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

    public function getLead()
    {
        return $this->hasOne(generate_lead::class, 'id', 'lead_id');
    }

    public function getUserEmail()
    {
        return $this->hasOne(User::class, 'id', 'assigned_to');
    }

    public function getPipeline()
    {
        return $this->hasOne(Sale::class, 'id', 'pipeline_id');
    }
    
    public function getTilte()
    {
        return $this->hasOne(PersonTitle::class,'id','title');
    }

    public function tags()
    {
        $tagIds = explode(',', $this->tag_id);
        return Tag::whereIn('id', $tagIds)->get();
    }

    public function filterTags()
    {        
        return $this->hasMany(Tag::class, 'id','tag_id');
    }

    public function title()
    {
        return $this->product_name; // or whatever method/attribute provides the title
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
