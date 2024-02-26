<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TranslRepositoryHelperServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        require_once app_path() . '/Helpers/Localization/TranslRepositoryHelper.php';
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

}
