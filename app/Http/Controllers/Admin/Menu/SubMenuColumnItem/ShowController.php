<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

use App\Models\Menu\MenuItem;

class ShowController extends BaseController{

    public function __invoke(MenuItem $menuItem){

        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $menuWidget = $menuItem->getMenuWidget();
        $parentItem = $menuItem->getParentItem();

        return view('admin.menu.submenucolumnitem.show', compact('menuWidget','parentItem', 'menuItem', 'locales', 'getLocaleName'));
    }
}
