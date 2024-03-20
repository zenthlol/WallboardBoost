<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallboard_Kenneth_SPV extends Model
{
    use HasFactory;

    protected $table = 'Wallboard_Kenneth_SPV';
    protected $fillable = [
        'Tm_Trx_Td',
        'Tm_Created_Date',
        'CAMPAIGN_NAME',
        'spv_dbid',
        'spv_username',
        'STATUS',
        'LOGIN_TIME',
        'Total_Call',
        'Talks_Time',
        'DEAL',
        'PREMI',
        'PARTNER'
    ];

    protected $primaryKey = 'Wallboard_Kenneth_SPV_id';
    public $timestamps = false;
}
