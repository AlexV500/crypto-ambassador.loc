<?php

namespace App\Repositories\Menu\MenuItem;
use App\Models\Menu\MenuItem;
use App\Repositories\Menu\MenuItem\Interface\MenuItemRepositoryInterface;
class MenuItemRepository implements MenuItemRepositoryInterface
{
    public function getNextOrPrevMenuItem($nextOrPrevRowId){
        return MenuItem::where('id', '=',  $nextOrPrevRowId)->first();
    }
}
