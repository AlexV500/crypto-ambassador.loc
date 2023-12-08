<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;

class PositionUpController extends BaseSubController{

    public function __invoke(MenuWidget $menuWidget, MenuItem $menuItem){

        $this->service->positionUp($menuItem);
        return redirect()->route('admin.menu.menuitem.index', $menuWidget);
    }
}
