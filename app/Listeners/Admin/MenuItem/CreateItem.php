<?php

namespace App\Listeners\Admin\MenuItem;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateItem
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
        $parentId = request()->input('parent_id');

        $type = request()->input('type');
        if($type == 'menuColumnItem'){
            $query =  $event->menuItem->where('type', request()->input('column_number'));
        } else {
            $query =  $event->menuItem;
        }
        $event->menuItem->position = $query
                ->where('menu_widget_id', request()->input('menu_widget_id'))
                ->where('parent_id', $parentId)
                ->max('position') + 1;
        if ($parentId > 0) {

            $event->menuItem->depth = $event->menuItem
                    ->where('parent_id', $parentId)
                    ->max('depth') + 1;
            $parentDepth = $event->menuItem
                ->where('id', $parentId)
                ->max('depth');

            $event->menuItem->depth = $parentDepth + 1;

        }
    }
}
