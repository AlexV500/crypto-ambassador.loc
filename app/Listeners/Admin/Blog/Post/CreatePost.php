<?php

namespace App\Listeners\Admin\Blog\Post;

use App\Events\Admin\Blog\Post\CreatePostEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreatePost
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreatePostEvent $event): void
    {
        //
    }
}
