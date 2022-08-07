<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index()
    {
        $games = null;
        return view(
            'admin.games.index', compact('games')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'game_date' => 'required|date',
            'first_team_name' => 'required|string',
            'second_team_name' => 'required|string',
            'first_team_score' => 'required|int',
            'second_team_score' => 'required|int',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $owner = Owner::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                Shop::create([
                    'owner_id' => $owner->id,
                    'name' => '店名を入力してください',
                    'information' => '',
                    'filename' => '',
                    'is_selling' => true
                ]);
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return redirect()
            ->route('admin.owners.index')
            ->with([
                'message' => 'スカウト登録を実施しました。',
                'status' => 'info'
            ]);
    }


}
