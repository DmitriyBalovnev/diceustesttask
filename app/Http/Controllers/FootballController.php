<?php

namespace App\Http\Controllers;

use App\Models\MatchResults;
use App\Models\LeagueTable;
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
        $teams = LeagueTable::all();
        return view('result')->with('teams', $teams);
    }

    public function result()
    {

    }

    public function addteam(Request $request)
    {

        if (empty($request->get('teamname'))) {
            return redirect('/');
        }
        $teams = DB::table('LeagueTable')->where('team_name', $request->get('teamname'))->first();

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
            DB::table('LeagueTable')->where('id', $teams->id)->delete();
        }
        return redirect('/');
    }

    public function playall()
    {
        $teams = LeagueTable::all()->pluck('id');

        $this->play($teams);

        return $this->index();
    }

    public function play($teams)
    {
        $team = new LeagueTable();
        $match = ['teamid1' => 1, ' teamid2 ' => 1, 'goal1' => 1, ' goal2' => 1];
        $match = MatchResults::create($match);

        foreach ($teams as $index => $itemid) {
            $goal = random_int(1, 3);
            if ($game == 3) {
                $team->win($itemid);
            }
            if ($game == 2) {
                $team->draw($itemid);

            }
            if ($game == 1) {
                $team->loose($itemid);
            }
        }

    }

    public function nextweek()
    {
        $teams = new LeagueTable();
        $teams->pts = '1';
        $teams->p = '1';
        $teams->w = '1';
        $teams->d = '1';
        $teams->l = '1';
        $teams->gd = '1';
        $teams->save();

        $this->index();
    }

}
