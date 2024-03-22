<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('PostService', 'App\Services\Admin\Blog\PostService.php');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

}
