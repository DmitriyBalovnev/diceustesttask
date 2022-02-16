<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FootballController extends Controller
{

    public function index()
    {
        return view('result');
    }

    public function result()
    {

        $arr = [];
        $result = ['name' => 'Abigail', 'state' => 'CA'];

        return response()->json($result);
    }
    public function addteam(Request $request)
    {
        $teams = new Teams();

        $teams->teamname = $request->name;
        $teams->pts = $request->pts;
        $teams->p = $request->p;
        $teams->w = $request->w;
        $teams->d = $request->d;
        $teams->l = $request->l;
        $teams->gd = $request->gd;

        $teams->save();

    }
    public function playall()
    {
        $generatefakedata = []; // 1 week

        $teams = new Teams();
        $teams->save($generatefakedata);
        $teams->playall();
        return view('result', $teams);
    }

    public function nextweek()
    {
        $generatefakedata = []; // 6 week

        $teams = new Teams();
        $teams->nextweek();
        $teams->save($generatefakedata);

        return view('result', $teams);
    }

}
