<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LeagueTable extends Model
{
    use HasFactory;

    protected $table = 'league_table';

    public static function win($teamname)
    {
        $score = ['pts' => 3, 'p' => 1, 'w' => 1, 'd' => 0, 'l' => 0, 'gd' => 1];
        LeagueTable::query()->where('team_name', $teamname)->increment('', '', $score);
    }

    public static function draw($teamname)
    {
        $score = ['pts' => 2, 'p' => 1, 'w' => 0, 'd' => 1, 'l' => 0, 'gd' => 1];
        LeagueTable::query()->where('team_name', $teamname)->increment('pts', 2, $score);
    }

    public static function loose($teamname)
    {
        $score = ['pts' => 1, 'p' => 1, 'w' => 0, 'd' => 0, 'l' => 1, 'gd' => 1];
        LeagueTable::query()->where('team_name', $teamname)->increment('pts', 2, $score);
    }

}
