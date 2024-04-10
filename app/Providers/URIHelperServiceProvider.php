<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class URIHelperServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        require_once app_path() . '/Helpers/URI/URIHelper.php';
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
