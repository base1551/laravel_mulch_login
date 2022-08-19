<?php

namespace App\Http\Controllers\Admin;

use App\Consts\CommonConst;
use App\Consts\GameTeamConst;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Team;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;
use function PHPUnit\Framework\isNull;
use function PHPUnit\Framework\throwException;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $games = Game::paginate(CommonConst::PAGINATE_COUNT);
//        dump($games[1]);
//        dd($games[0]->id);

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
     * @param Request $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function store(Request $request): RedirectResponse
    {
        //todo:フォームバリデーション
        $request->validate([
            'game_date' => 'required|date',
            'first_team_name' => 'required|string',
            'second_team_name' => 'required|string',
            'first_team_score' => 'required|int',
            'second_team_score' => 'required|int',
        ]);

        try {
            //todo:idからの取得
            //game更新
            //game_team登録
            DB::transaction(function () use ($request) {
                $first_team = Team::where('name', $request->first_team_name)->firstOrFail();
                $second_team = Team::where('name', $request->second_team_name)->firstOrFail();

                $game = Game::create([
                    'game_date' => Carbon::parse($request->game_date),
                ]);
                //todo:ヒット、エラー数登録処理
                //todo:共通化
                $game->teams()->attach(
                    $first_team->id,
                    [
                        'first_attack_flg' => GameTeamConst::FIRST_ATTACK,
                        'score' => $request->first_team_score,
                    ]
                );
                $game->teams()->attach(
                    $second_team->id,
                    [
                        'first_attack_flg' => GameTeamConst::SECOND_ATTACK,
                        'score' => $request->second_team_score,
                    ]
                );
            });
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return redirect()
            ->route('admin.games.index')
            ->with([
                'message' => '試合登録を実施しました。',
                'status' => 'info'
            ]);
    }

    /**
     * 試合変種画面に遷移
     */
    public function edit(int $id): Factory|View|Application
    {
        $game = Game::findOrFail($id);
        return view('admin.games.edit', compact('game'));
    }

}
