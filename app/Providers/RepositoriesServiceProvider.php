<?php

namespace App\Providers;

use App\Contracts\Repositories\ContactsRepositoryContract;
use App\Contracts\Repositories\PrioritiesRepositoryContract;
use App\Contracts\Repositories\RolesRepositoryContract;
use App\Repositories\ContactsRepository;
use App\Repositories\PrioritiesRepository;
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
        $this->app->singleton(ContactsRepositoryContract::class, ContactsRepository::class);
        $this->app->singleton(PrioritiesRepositoryContract::class, PrioritiesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
