<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PragmaRX\Google2FALaravel\ServiceProvider as Google2FAServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Registra el proveedor de servicios de Google2FA
        $this->app->register(Google2FAServiceProvider::class);
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
