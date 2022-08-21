<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            チーム情報編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 mx-auto">
                            <div class="flex flex-col text-center w-full mb-12">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">試合情報編集</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                                <form method="post" action="{{ route('admin.games.update', ['game' => $game->id])}}">
                                    @method('PUT')
                                    @csrf
                                    <div class="-m-2">
                                        @include('admin/games/_form')
                                        <div class="p-2 w-full flex justify-around mt-4">
                                            <button type="button"
                                                    onclick="location.href='{{ route('admin.games.index')}}'"
                                                    class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">
                                                戻る
                                            </button>
                                            <button type="submit"
                                                    class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                                更新する
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
