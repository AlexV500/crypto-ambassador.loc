<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Models\Menu\MenuWidget;

class IndexController extends BaseSubController{

    public function __invoke(MenuWidget $menuWidget){

      //  dd($menuWidget);
        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $menuItems = $menuWidget->getItems();
        $menuTypes = $this->getMenuItemTypes();

        return view('admin.menu.menuitem.index', compact('menuWidget', 'locales', 'getCurrentLocale', 'getLocaleName', 'menuItems', 'menuTypes'));
    }
}
