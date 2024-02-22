<?php

namespace App\Providers;

use App\View\Components\Admin\MenuBreadcrumbs;
use App\View\Components\Admin\MenuWidgetItems;
use App\View\Components\Admin\AdminNavbar;
use App\View\Components\Admin\LanguageSelector;
use App\View\Components\Blog\BlogHeader;
use App\View\Components\Blog\BlogLanguageSwitcher;
use App\View\Components\Blog\Posts;
use App\View\Components\LanguageSwitcher;
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
        Blade::component(AdminNavbar::class, 'admin-navbar');
        Blade::component(LanguageSelector::class, 'language-selector');
        Blade::component(LanguageSwitcher::class, 'language-switcher');
        Blade::component(Posts::class, 'posts');
        Blade::component(BlogHeader::class, 'blog-header');
        Blade::component(BlogLanguageSwitcher::class, 'blog-language-switcher');

        Paginator::useBootstrapFive();
    }
}
