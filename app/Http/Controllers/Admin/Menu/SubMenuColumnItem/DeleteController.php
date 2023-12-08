<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

use App\Http\Controllers\Controller;
use App\Models\Menu\MenuItem;

class DeleteController extends Controller{

    public function __invoke(MenuItem $menuItem){
        $menuWidget = $menuItem->getMenuWidget();
        $parentItem = $menuItem->getParentItem();
        $menuItem->delete();
        return redirect()->route('admin.menu.submenucolumnitem.index', [$menuWidget->id, $parentItem->id]);
    }
}
