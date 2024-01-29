<?php

namespace App\Providers;

use App\Events\Admin\Blog\Post\CreatePostEvent;
use App\Events\Admin\MenuItem\CreatedMenuItemEvent;
use App\Events\Admin\MenuWidget\CreatedMenuWidgetEvent;
use App\Listeners\Admin\Blog\Post\CreatePost;
use App\Listeners\Admin\MenuItem\CreateItem;
use App\Listeners\Admin\MenuWidget\CreateWidget;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CreatedMenuWidgetEvent::class => [
            CreateWidget::class,
        ],
        CreatedMenuItemEvent::class => [
            CreateItem::class,
        ],
        CreatePostEvent::class => [
            CreatePost::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
