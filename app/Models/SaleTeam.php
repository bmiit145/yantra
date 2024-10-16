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
        'member_id'
    ];
}
