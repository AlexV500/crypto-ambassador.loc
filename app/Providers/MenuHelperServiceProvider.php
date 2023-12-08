<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        require_once app_path() . '/Helpers/Menu/MenuHelper.php';
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
