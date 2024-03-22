<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TranslateContentCreationServiceProvider extends ServiceProvider {

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('TranslateContentCreationService', 'App\Services\Admin\TranslateContentCreationService.php');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
