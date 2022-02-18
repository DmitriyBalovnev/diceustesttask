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
            $teams->team_name = $request->get('teamname');
            $teams->pts = 0;
            $teams->p = 0;
            $teams->w = 0;
            $teams->d = 0;
            $teams->l = 0;
            $teams->gd = 0;
            $teams->save();
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
        $MatchResults = new LeagueTable();
        $Prediction = new Prediction();

        foreach ($LeagueTable as $index => $itemid) {
            $match = ['teamname1' => $itemid["team_name"], 'teamname2' => $itemid["team_name"], 'goal1' => random_int(1, 3), 'goal2' => random_int(1, 3)];
            DB::table('match_results')->insert($match);
        }
//        die();
//        DB::table('league_table')->where('id', $index)->increment('pts', 3);
//
//
//        if ($goals1 > $goals2) {
//            $MatchResults->win($itemid);
//        }
//        if ($goals1 == $goals2) {
//            $MatchResults->draw($itemid);
//
//        }
//        if ($goals1 < $goals2) {
//            $MatchResults->loose($itemid);
//        }
    }

    public function nextweek()
    {
        $teams = new LeagueTable();

        $teams = ['pts' => 1, 'p' => 1, 'w' => 1, 'd' => 1, 'l' => 1, 'gd' => 1];
        $teams->save($teams);

        $this->index();
    }

}
