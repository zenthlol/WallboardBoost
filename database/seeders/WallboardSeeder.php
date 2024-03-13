<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WallboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wallboards')->insert([
            [
                'tm_trx_id' => 'SF01031911',
                'tm_created_date' => '2012-06-18 10:34:09',
                'campaign_name' => 'KampanyeSatu',
                'user_id' => '123',
                'user_name' => 'agentccexa',
                'status' => 'READY',
                'login_time' => null,
                'total_call' => '0',
                'talks_time' => '3:00',
                'agent_name' => 'agentccexa',
                'supervisor_name' => 'spvccexa',
                'deal' => '3',
                'premi' => '4',
                'partner' => 'CC'
            ]
            ]);
    }
}
