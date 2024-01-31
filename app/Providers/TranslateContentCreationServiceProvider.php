<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TranslateContentCreationServiceProvider extends ServiceProvider {

    /**
     * Register services.
     */
    public function register(): void
    {
        require_once app_path() . '/Services/Admin/TranslateContentCreationService.php';
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
