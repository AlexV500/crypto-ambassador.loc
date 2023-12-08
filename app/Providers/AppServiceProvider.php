<?php

namespace App\Providers;

use App\View\Components\Admin\MenuBreadcrumbs;
use App\View\Components\Admin\MenuWidgetItems;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component(MenuBreadcrumbs::class, 'menu-breadcrumbs');
        Blade::component(MenuWidgetItems::class, 'menu-widget-items');
        Paginator::useBootstrapFive();
    }
}
