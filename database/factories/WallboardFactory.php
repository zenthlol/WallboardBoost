<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallboard>
 */
class WallboardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
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
                'deal' => 'NO',
                'premi' => null,
                'partner' => 'CC'
        ];
    }
}
