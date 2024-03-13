<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'tm_trx_id',
        'tm_created_date',
        'campaign_name',
        'user_id',
        'user_name',
        'status',
        'login_time',
        'total_call',
        'talks_time',
        'agent_name',
        'supervisor_name',
        'deal',
        'premi',
        'partner'
    ];
}
