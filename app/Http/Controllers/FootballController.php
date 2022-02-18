<?php

namespace App\Http\Controllers;

use App\Models\MatchResults;
use App\Models\LeagueTable;
use App\Models\Prediction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class FootballController extends Controller
{

    public function index()
    {
        if (isset($_GET['action']) == 'clearalldatabase') {
            $this->clearalldatabase();
        }
        $leaguetables = LeagueTable::all();
        $matchresults = MatchResults::all();
        $prediction = new Prediction;
        $leaguetable = LeagueTable::all();
        foreach ($leaguetable as $index => $item) {
            if (empty(Prediction::all()->pluck('teamname', $item->team_name)) == false) {
                $prediction = new Prediction;
                $prediction->teamname = $item->team_name;
                $prediction->percentage = "%" . $item->pts;
                $prediction->save();
            }

        }
        $prediction = Prediction::all();

        return view('result')->with('leaguetables', $leaguetables)->with('matchresults', $matchresults)->with('prediction', $prediction);
    }

    public function clearalldatabase()
    {
        LeagueTable::query()->delete();
        MatchResults::query()->delete();
        Prediction::query()->delete();

    }

    public function result()
    {

    }

    public function addteam(Request $request)
    {

        if (empty($request->get('teamname'))) {
            return redirect('/');
        }
        $teams = DB::table('league_table')->where('team_name', $request->get('teamname'))->first();

        if ($teams === null) {
            $teams = new LeagueTable;
            $params = ['team_name' => $request->get('teamname'), 'pts' => 1, 'p' => 1, 'w' => 1, 'd' => 1, 'l' => 1, 'gd' => 1];
            $teams->save($params);
        } else {
            DB::table('league_table')->where('id', $teams->id)->delete();
        }
        return redirect('/');
    }

    public function playall()
    {

        $this->play();

        return $this->index();
    }

    public function play()
    {

        $LeagueTable = LeagueTable::all();
        $MatchResult = new LeagueTable();
        $Prediction = new Prediction();

        foreach ($LeagueTable as $index => $itemid) {
            $match = ['teamname1' => $itemid["team_name"], 'teamname2' => $itemid["team_name"], 'goal1' => random_int(1, 3), 'goal2' => random_int(1, 3)];
            DB::table('match_results')->insert($match);
        }

        DB::table('league_table')->where('id', $index)->increment('pts', 3);
        $MatchResults = MatchResults::all();
        foreach ($MatchResults as $index => $matchResult) {

            $goals1 = $matchResult->goal1;
            $goals2 = $matchResult->goal2;

            if ($goals1 > $goals2) {
                $MatchResult->win($matchResult);
            }
            if ($goals1 == $goals2) {
                $MatchResult->draw($itemid);

            }
            if ($goals1 < $goals2) {
                $MatchResult->loose($itemid);
            }
        }
    }

    public function nextweek()
    {
        $teams = new LeagueTable();
        $params = ['pts' => 1, 'p' => 1, 'w' => 1, 'd' => 1, 'l' => 1, 'gd' => 1];
        $teams->save($params);

        $this->index();
    }

}
