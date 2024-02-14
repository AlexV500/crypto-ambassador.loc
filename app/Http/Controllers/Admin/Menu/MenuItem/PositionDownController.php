<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;

class PositionDownController extends BaseController{

    public function __invoke(MenuWidget $menuWidget, MenuItem $menuItem){

        $this->service->positionDown($menuItem);
        return redirect()->route('admin.menu.menuitem.index', $menuWidget);
    }
}
