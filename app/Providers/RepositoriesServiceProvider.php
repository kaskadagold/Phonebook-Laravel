<?php

namespace App\Providers;

use App\Contracts\Repositories\RolesRepositoryContract;
use App\Repositories\RolesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(RolesRepositoryContract::class, RolesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
