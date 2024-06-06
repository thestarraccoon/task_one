<?php

namespace App\Providers;

use App\Interfaces\EventServiceInterface;
use App\Services\SubscribeOnEventService;
use App\Services\UnsubscribeOnEventService;
use Illuminate\Support\Facades\Schema;
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
        $this->app->bind(EventServiceInterface::class, SubscribeOnEventService::class);
        $this->app->bind(EventServiceInterface::class, UnsubscribeOnEventService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
