<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request as Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App\Models\MatchResults;
use App\Models\LeagueTable;
use App\Models\Prediction;
use App\Models\Week;

class FootballController extends Controller
{

    public function index()
    {
        if (isset($_GET['action']) == 'clearalldatabase') {
            $this->clearalldatabase();
        }

        $leaguetables = LeagueTable::all();
        $matchresults = MatchResults::all();
        $matchresults = MatchResults::all()->take('4');
        $prediction = Prediction::all();
        $weeknow = MatchResults::all()->take('4');
        empty($weeknow) ? $weeknow = 0 : $weeknow = 0;

        return view('layout')->with('leaguetables', $leaguetables)->with('matchresults', $matchresults)->with('prediction', $prediction)->with('week', $weeknow);

    }

    public function clearAllDatabase()
    {
        LeagueTable::query()->truncate();
        MatchResults::query()->delete();
        Prediction::query()->delete();

        $array = ['team_name' => 'Chelsea', 'pts' => 0, 'p' => 0, 'w' => 0, 'd' => 0, 'l' => 0, 'gd' => 0,];
        LeagueTable::query()->insert($array);
        $array = ['team_name' => 'Arsenal', 'pts' => 0, 'p' => 0, 'w' => 0, 'd' => 0, 'l' => 0, 'gd' => 0,];
        LeagueTable::query()->insert($array);
        $array = ['team_name' => 'Manchester City', 'pts' => 0, 'p' => 0, 'w' => 0, 'd' => 0, 'l' => 0, 'gd' => 0,];
        LeagueTable::query()->insert($array);
        $array = ['team_name' => 'Liverpool', 'pts' => 0, 'p' => 0, 'w' => 0, 'd' => 0, 'l' => 0, 'gd' => 0,];
        LeagueTable::query()->insert($array);

        return redirect('/');
    }

    public function addTeam(Request $request)
    {

        if (empty($request->get('teamname'))) {
            return redirect('/');
        }
        $teams = DB::table('league_table')->where('team_name', $request->get('teamname'))->first();

        if ($teams === null) {
            $LeagueTable = new LeagueTable;

            $LeagueTable->team_name = $request->get('teamname');
            $LeagueTable->pts = 0;
            $LeagueTable->p = 0;
            $LeagueTable->w = 0;
            $LeagueTable->d = 0;
            $LeagueTable->l = 0;
            $LeagueTable->gd = 0;
            $LeagueTable->save();

        } else {
            DB::table('league_table')->where('id', $teams->id)->delete();
        }
        return redirect('/');
    }

    public function playAll()
    {

        $this->playTournament();

        return redirect('/');
    }

    public function playTournament()
    {
        $LeagueTable = LeagueTable::all();
        $MatchResult = MatchResults::all();
        $prediction = new Prediction();

        foreach ($LeagueTable as $index => $itemid) {
            $weekname = Week::all()->pluck('weekscounter', 'id')->last();
            $_COOKIE['week'] = $weekname + 1;
            $match = ['teamname1' => $LeagueTable[$index]['team_name'], 'teamname2' => $index == 3 ? $LeagueTable[1]['team_name'] : $LeagueTable[$index + 1]['team_name'], 'goal1' => random_int(1, 3), 'goal2' => random_int(1, 3), 'week' => $weekname + 1];
            MatchResults::query()->insert($match);

        }
        $week = new Week;
        $weekname = Week::all()->pluck('weekscounter', 'id')->last();
        $week->weekscounter = $weekname + 1;
        $week->save();
        Prediction::query()->delete();
        foreach ($LeagueTable as $index => $item) {
            DB::table('prediction')->insert(['teamname' => $LeagueTable[$index]['team_name'], 'percentage' => "%" . $item->pts, 'week' => $weekname + 1]);
        }

        $MatchResults = MatchResults::all();
        foreach ($MatchResults as $index => $matchResult) {
            $goals1 = $matchResult->goal1;
            $goals2 = $matchResult->goal2;
            if ($goals1 > $goals2) {
                $result = [];
                LeagueTable::win($matchResult->teamname1);
                LeagueTable::loose($matchResult->teamname2);
            }

            if ($goals1 == $goals2) {
                LeagueTable::draw($matchResult->teamname1);
                LeagueTable::draw($matchResult->teamname2);
            }
            if ($goals1 < $goals2) {
                LeagueTable::loose($matchResult->teamname1);
                LeagueTable::loose($matchResult->teamname2);
            }
        }

    }

    public function nextWeek()
    {
        $weeknow = $_GET['week'];
        $leaguetables = LeagueTable::all();
        $matchresults = MatchResults::all()->where('week', '==', $weeknow);
        $prediction = Prediction::all();
        return view('layout')->with('leaguetables', $leaguetables)->with('matchresults', $matchresults)->with('prediction', $prediction)->with('week', $weeknow);
    }

}
