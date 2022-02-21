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
        LeagueTable::query()->where('team_name', $teamname)->increment('pts', 3);
        LeagueTable::query()->where('team_name', $teamname)->increment('p', 1);
        LeagueTable::query()->where('team_name', $teamname)->increment('w', 1);
        LeagueTable::query()->where('team_name', $teamname)->increment('d', 0);
        LeagueTable::query()->where('team_name', $teamname)->increment('l', 0);
        LeagueTable::query()->where('team_name', $teamname)->increment('gd', 1);
    }

    public static function draw($teamname)
    {
        LeagueTable::query()->where('team_name', $teamname)->increment('pts', 2);
        LeagueTable::query()->where('team_name', $teamname)->increment('p', 1);
        LeagueTable::query()->where('team_name', $teamname)->increment('w', 0);
        LeagueTable::query()->where('team_name', $teamname)->increment('d', 1);
        LeagueTable::query()->where('team_name', $teamname)->increment('l', 0);
        LeagueTable::query()->where('team_name', $teamname)->increment('gd', 1);
    }

    public static function loose($teamname)
    {
        LeagueTable::query()->where('team_name', $teamname)->increment('pts', 1);
        LeagueTable::query()->where('team_name', $teamname)->increment('p', 1);
        LeagueTable::query()->where('team_name', $teamname)->increment('w', 0);
        LeagueTable::query()->where('team_name', $teamname)->increment('d', 0);
        LeagueTable::query()->where('team_name', $teamname)->increment('l', 1);
        LeagueTable::query()->where('team_name', $teamname)->increment('gd', 1);

    }

    public static function percentcalcsummary()
    {

    }
}
