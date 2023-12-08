<?php

namespace App\Listeners\Admin\MenuWidget;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateWidget
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
    public function handle(object $event): void
    {

        $event->menuWidget->sort = config('menu.positions')[request()->input('position')]['order'];
    }
}
