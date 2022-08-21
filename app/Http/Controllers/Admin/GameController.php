<?php

namespace App\Http\Controllers\Admin;

use App\Consts\CommonConst;
use App\Consts\GameTeamConst;
use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use App\Models\Game;
use App\Models\Team;
use App\Repositories\GameRepository;
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
     * @param GameRequest $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function store(GameRequest $request): RedirectResponse
    {
        try {
            DB::transaction(function () use ($request) {
                $game = Game::create([
                    'game_date' => Carbon::parse($request->game_date),
                ]);
                $repo = new GameRepository();
                $repo->saveGameTeamRelation($request, $game);
            });

        } catch (Throwable $e) {
            Log::error($e);
            abort(403);
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
        //todo:リポジトリクラスに取得処理実装
        if ($game->teams[0]->pivot->first_attack_flg == GameTeamConst::FIRST_ATTACK) {
            $first_team = $game->teams[0];
            $second_team = $game->teams[1];
        } else {
            $first_team = $game->teams[1];
            $second_team = $game->teams[0];
        }

        return view('admin.games.edit', compact('game', 'first_team', 'second_team'));
    }

    /**
     * 更新処理
     */
    public function update(GameRequest $request, int $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $game = Game::findOrFail($id);
                $game->update($request->toArray());

                $repo = new GameRepository();
                $repo->saveGameTeamRelation($request, $game);
            });

        } catch (Throwable $e) {
            Log::error($e);
            abort(403);
        }
        return redirect()
            ->route('admin.games.edit', ['game' => $id])
            ->with([
                'message' => '試合情報を更新しました。',
                'status' => 'info'
            ]);
    }


}
