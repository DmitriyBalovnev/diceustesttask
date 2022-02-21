<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LeagueTable;

class LeagueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeagueTable::create([
            'team_name' => 'Chelsea',
            'pts' => 0,
            'w' => 0,
            'd' => 0,
            'l' => 0,
            'gd' => 0,
        ]);
        LeagueTable::create([
            'team_name' => 'Arsenal',
            'pts' => 0,
            'w' => 0,
            'd' => 0,
            'l' => 0,
            'gd' => 0,
        ]);
        LeagueTable::create([
            'team_name' => 'Manchester City',
            'pts' => 0,
            'w' => 0,
            'd' => 0,
            'l' => 0,
            'gd' => 0,
        ]);
        LeagueTable::create([
            'team_name' => 'Liverpool',
            'pts' => 0,
            'w' => 0,
            'd' => 0,
            'l' => 0,
            'gd' => 0,
        ]);
    }
}
