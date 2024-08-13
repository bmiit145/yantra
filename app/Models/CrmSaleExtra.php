<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrmSaleExtra extends Model
{
    use HasFactory;

    protected $table = 'crm_sale_extra';

    protected $fillable = [
        'sale_id',
        'company_name',
        'contact_name',
        'person_title',
        'job_position',
        'mobile',
        'address_1',
        'address_2',
        'city',
        'zip',
        'country_id',
        'state_id',
        'website',
        'campaign_id',
        'source_id',
        'medium_id',
        'referred_by',
        'sale_team_id',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function medium()
    {
        return $this->belongsTo(Medium::class);
    }

    public function saleTeam()
    {
        return $this->belongsTo(SaleTeam::class);
    }

    public function personTitle()
    {
        return $this->belongsTo(PersonTitle::class);
    }

}
