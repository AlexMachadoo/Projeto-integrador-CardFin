<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public const HOME = '/dashboard';
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
        //
    }
    
}
class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/dashboard'; // O redirecionamento após login

    public function boot()
    {
        //
    }

    public function register()
    {
        //
    }
}
