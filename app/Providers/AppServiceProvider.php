<?php

namespace App\Providers;

use App\Models\Emp;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        // $this->registerPolicies();
        // ResetPassword::createUrlUsing(function (Emp $user, string $token) {
        //     return 'http://127.0.0.1:8000/emp/reset-password' . $token;
        // });
        Schema::defaultStringLength(191);
    }
}