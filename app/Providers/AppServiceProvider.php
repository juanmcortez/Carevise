<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Requests\Fortify\LoginUserRequest;
use Laravel\Fortify\Http\Requests\LoginRequest;

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
        // Binding custom form request for login
        $this->app->bind(LoginRequest::class, LoginUserRequest::class);
    }
}
