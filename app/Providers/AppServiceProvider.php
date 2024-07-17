<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::tokensExpireIn(Carbon::now()->addSeconds(60));
        Passport::refreshTokensExpireIn(Carbon::now()->addSeconds(60));
        Passport::personalAccessTokensExpireIn(Carbon::now()->addSeconds(60));
    }
}
