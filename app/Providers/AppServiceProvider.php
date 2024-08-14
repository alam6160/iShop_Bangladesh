<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Actions\Fortify\CustomLogoutResponse;
use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LogoutResponseContract::class, CustomLogoutResponse::class);
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
