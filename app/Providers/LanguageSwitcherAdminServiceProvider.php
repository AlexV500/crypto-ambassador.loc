<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LanguageSwitcherAdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('LanguageSwitcherService', 'App\Services\Admin\LanguageSwitcherService.php');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
