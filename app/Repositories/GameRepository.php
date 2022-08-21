<?php

namespace App\Repositories;

use App\Consts\GameTeamConst;
use App\Models\Game;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GameRepository implements GameRepositoryInterface
{
    public function getGameById($id)
    {
        return Game::find($id);
    }

    /**
     * 試合、中間テーブルを更新処理
     * @return void
     */
    public function saveGameTeamRelation($request, $game)
    {
        $first_team = Team::where('name', $request->first_team_name)->firstOrFail();
        $second_team = Team::where('name', $request->second_team_name)->firstOrFail();


        //todo:ヒット、エラー数登録処理
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
    }
}
