<?php

namespace App\Http\Controllers\Admin;

use App\Consts\CommonConst;
use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Models\Shop;
use App\Models\Team;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class TeamController extends Controller
{
    /**
     * チーム一覧
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $teams = Team::paginate(CommonConst::PAGINATE_COUNT);
        return view(
            'admin.teams.index', compact('teams')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function create(): View|Factory|\Illuminate\Http\Response|Application
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws Throwable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $team = Team::create([
                    'name' => $request->name,
                ]);
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return redirect()
            ->route('admin.teams.index')
            ->with([
                'message' => 'チーム登録を実施しました。',
                'status' => 'info'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function edit($id): View|Factory|\Illuminate\Http\Response|Application
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $team = Team::findOrFail($id);
        $team->name = $request->name;
        $team->save();

        return redirect()
            ->route('admin.teams.index')
            ->with([
                'message' => 'チーム情報を更新しました。',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        Team::findOrFail($id)->delete(); //ソフトデリート

        return redirect()
            ->route('admin.team.index')
            ->with([
                'message' => 'チーム情報を削除しました。',
                'status' => 'alert'
            ]);
    }
}
