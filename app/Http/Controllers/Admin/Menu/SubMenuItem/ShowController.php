<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuItem;

use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;

class ShowController extends BaseController{

    public function __invoke(MenuWidget $menuWidget, MenuItem $menuItem){

        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $menuWidget = $menuItem->getMenuWidget();
        $parentItem = $menuItem->getParentItem();

        return view('admin.menu.submenuitem.show', compact('menuWidget', 'parentItem', 'menuItem', 'locales', 'getLocaleName'));
    }
}
