<div class="p-2 w-1/2 mx-auto">
    <div class="relative">
        <label for="game_date"
               class="leading-7 text-sm text-gray-600">試合日</label>
        <input type="date" id="game_date" name="game_date"
               value="{{ isset($game) ? $game->game_date : old('game_date')}}"
               required
               class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
    </div>
</div>
{{-- todo:非同期でキーワードでチーム検索できるようにする--}}
<div class="p-2 w-1/2 mx-auto">
    <div class="relative">
        <label for="first_team_name" class="leading-7 text-sm text-gray-600">先攻チーム</label>
        <input type="text" id="first_team_name" name="first_team_name"
               value="{{ isset($game) ? $game->first_team_name : old('first_team_name')}}"
               required
               class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
    </div>
</div>
<div class="p-2 w-1/2 mx-auto">
    <div class="relative">
        <label for="first_team_score" class="leading-7 text-sm text-gray-600">先攻チーム得点</label>
        <input type="number" id="first_team_score" name="first_team_score"
               value="{{ isset($game) ? $game->first_team_score : old('first_team_score')}}"
               required
               min="0"
               class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
    </div>
</div>

<div class="p-2 w-1/2 mx-auto">
    <div class="relative">
        <label for="second_team_name" class="leading-7 text-sm text-gray-600">後攻チーム</label>
        <input type="text" id="second_team_name" name="second_team_name"
               value="{{ isset($game) ? $game->second_team_name : old('second_team_name')}}"
               required
               class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
    </div>
</div>
<div class="p-2 w-1/2 mx-auto">
    <div class="relative">
        <label for="second_team_score" class="leading-7 text-sm text-gray-600">後攻チーム得点</label>
        <input type="number" id="second_team_score" name="second_team_score"
               value="{{ isset($game) ? $game->second_team_score : old('second_team_score')}}"
               required
               min="0"
               class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
    </div>
</div>
