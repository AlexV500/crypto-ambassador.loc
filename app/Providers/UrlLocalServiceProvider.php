<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UrlLocalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        require_once app_path() . '/Helpers/Localization/UrlLocal.php';
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
