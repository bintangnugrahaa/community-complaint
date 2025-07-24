<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Interfaces\AuthRepositoryInterface::class,
            \App\Repositories\AuthRepository::class
        );

        $this->app->bind(
            \App\Interfaces\ResidentRepositoryInterface::class,
            \App\Repositories\ResidentRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
