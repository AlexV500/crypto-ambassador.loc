<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class ImagesGalleryUploadServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('ImagesGalleryUploadService', 'App\Services\Admin\Media\ImagesGalleryUploadService.php');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

}
