<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            試合登録
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 mx-auto">
                            <div class="flex flex-col text-center w-full mb-12">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">試合登録</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                                <form method="post" action="{{ route('admin.games.store')}}">
                                    @csrf
                                    <div class="-m-2">

                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="game_date"
                                                       class="leading-7 text-sm text-gray-600">試合日</label>
                                                <input type="date" id="game_date" name="game_date"
                                                       value="{{ old('game_date')}}"
                                                       required
                                                       class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        {{-- todo:非同期でキーワードでチーム検索できるようにする--}}
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="first_team_name" class="leading-7 text-sm text-gray-600">先攻チーム</label>
                                                <input type="text" id="first_team_name" name="first_team_name"
                                                       value="{{ old('first_team_name')}}"
                                                       required
                                                       class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="first_team_score" class="leading-7 text-sm text-gray-600">先攻チーム得点</label>
                                                <input type="number" id="first_team_score" name="first_team_score"
                                                       value="{{ old('first_team_score')}}"
                                                       required
                                                       min="0"
                                                       class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>

                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="second_team_name" class="leading-7 text-sm text-gray-600">後攻チーム</label>
                                                <input type="text" id="second_team_name" name="second_team_name"
                                                       value="{{ old('second_team_name')}}"
                                                       required
                                                       class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="second_team_score" class="leading-7 text-sm text-gray-600">後攻チーム得点</label>
                                                <input type="number" id="second_team_score" name="second_team_score"
                                                       value="{{ old('second_team_score')}}"
                                                       required
                                                       min="0"
                                                       class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>

                                        <div class="p-2 w-full flex justify-around mt-4">
                                            <button type="button"
                                                    onclick="location.href='{{ route('admin.games.index')}}'"
                                                    class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">
                                                戻る
                                            </button>
                                            <button type="submit"
                                                    class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                                登録する
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
