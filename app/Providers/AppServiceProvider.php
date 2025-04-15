<?php

namespace App\Providers;

use App\Contracts\Services\ContactCreationServiceContract;
use App\Contracts\Services\ContactRemoverServiceContract;
use App\Contracts\Services\ContactUpdateServiceContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\MessageLimiterContract;
use App\Models\Image;
use App\Services\ContactsService;
use App\Services\FlashMessage;
use App\Services\MessageLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\Facades\Config;
use App\Faker\FakerImageProvider;
use App\Services\ImagesService;
use App\Contracts\Services\ImagesServiceContract;

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
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create(Config::get('app.faker_locale', 'en_US'));
            $faker->addProvider(new FakerImageProvider($faker));
            return $faker;
        });
        $this->app->singleton(ImagesServiceContract::class, function () {
            return $this->app->make(ImagesService::class, ['disk' => 'public']);
        });
        $this->app->singleton(ContactCreationServiceContract::class, ContactsService::class);
        $this->app->singleton(ContactUpdateServiceContract::class, ContactsService::class);
        $this->app->singleton(ContactRemoverServiceContract::class, ContactsService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('admin', fn () => Gate::allows('admin'));
    }
}
