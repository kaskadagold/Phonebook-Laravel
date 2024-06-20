<?php

namespace App\Providers;

use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\MessageLimiterContract;
use App\Services\FlashMessage;
use App\Services\MessageLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FlashMessageContract::class, FlashMessage::class);
        $this->app->singleton(MessageLimiterContract::class, MessageLimiter::class);
        $this->app->singleton(
            FlashMessage::class, 
            fn () => new FlashMessage($this->app->make (MessageLimiterContract::class), session())
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('admin', fn () => Gate::allows('admin'));
    }
}
