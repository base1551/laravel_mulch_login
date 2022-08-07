<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index()
    {
//        $games = (new \App\Models\Game)->findTeamByGameAll();
//        dd($games);
        $games = null;
        return view(
            'admin.games.index', compact('games')
        );
    }

//    public function ()

}
