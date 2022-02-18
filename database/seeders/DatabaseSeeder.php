<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\LeagueTable::factory(10)->create();
       \App\Models\MatchResults::factory(10)->create();
       \App\Models\Prediction::factory(10)->create();
    }
}
