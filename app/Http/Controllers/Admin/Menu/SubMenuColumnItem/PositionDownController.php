<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

use App\Http\Controllers\Admin\Menu\BaseController;
use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;

class PositionDownController extends BaseSubController{

    public function __invoke(MenuWidget $menuWidget, MenuItem $menuItem){

        $this->service->positionDown($menuItem);
        $parentItem = $menuItem->getParentItem();
        return redirect()->route('admin.menu.submenucolumnitem.index', [$menuWidget, $parentItem]);
    }
}
