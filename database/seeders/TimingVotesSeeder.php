<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimingVote;

class TimingVotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TimingVote::create([
            'start_time' => now(),
            'end_time' => now(),
        ]);
    }
}
