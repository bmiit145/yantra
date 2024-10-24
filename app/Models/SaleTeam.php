<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'team_leader',
        'sales_type',
        'email',
        'accept_emails_from',
        'invoicing_target',
        'member_id',
    ];

    public function user(){
        return $this->hasOne(User::class,'id','team_leader');
    }

    public function getPriceList()
    {
        // Explode the comma-separated string into an array
        $memberIDs = explode(',', $this->member_id);
    
        // Retrieve the related User records
        return User::whereIn('id', $memberIDs)->get();
    }
}
