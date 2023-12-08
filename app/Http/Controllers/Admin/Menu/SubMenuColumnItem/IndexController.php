<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;

class IndexController extends BaseSubController{

    public function __invoke(MenuWidget $menuWidget, MenuItem $parentItem){

        $menuItems = $parentItem->child();
        $menuTypes = $this->getSubMenuColumnItemTypes();
        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();

        return view('admin.menu.submenucolumnitem.index', compact(
            'menuWidget',
            'menuItems',
            'menuTypes',
            'locales',
            'getCurrentLocale',
            'getLocaleName'
            ));
    }
}
