<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Http\Controllers\Admin\Menu\SubMenuItem\BaseController;
use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;

class VisibleController extends BaseController{

    public function __invoke(MenuWidget $menuWidget, MenuItem $menuItem){

        $this->service->toggleVisibility($menuItem);
        $parentItem = $menuItem->getParentItem();
        return redirect()->route('admin.menu.menuitem.index', [$menuWidget, $parentItem]);
    }
}
