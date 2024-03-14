<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vTM_WALLBOARD extends Model
{
    use HasFactory;

    protected $table = 'vTM_WALLBOARD';
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
        'SUPERVISOR_NAME',
        'DEAL',
        'PREMI',
        'PARTNER'
    ];

    protected $primaryKey = 'vTM_WALLBOARD_id';
    public $timestamps = false;
}
