<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallboard_Kenneth_Agent extends Model
{
    use HasFactory;

    protected $table = 'Wallboard_Kenneth_Agent';
    protected $fillable = [
        'Tm_Trx_Td',
        'Tm_Created_Date',
        'CAMPAIGN_NAME',
        'USER_ID',
        'USER_NAME',
        'STATUS',
        'LOGIN_TIME',
        'Total_Call',
        'Talks_Time',
        'AGENT_NAME',
        'DEAL',
        'PREMI',
        'PARTNER'
    ];

    protected $primaryKey = 'Wallboard_Kenneth_Agent_id';
    public $timestamps = false;
}
