<?php

namespace App\Providers;

use App\Repositories\GameRepository;
use App\Repositories\GameRepositoryInterface;
use App\Services\GameService;
use App\Services\GameServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            GameRepositoryInterface::class,
            GameRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
