<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Models\Menu\MenuItem;

class EditController extends BaseController{

    public function __invoke(MenuItem $menuItem){

        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $menuTypes = $this->getMenuItemTypes();
        $menuWidget = $menuItem->getMenuWidget();

        return view('admin.menu.menuitem.edit', compact('menuWidget','menuItem', 'menuTypes', 'locales', 'getCurrentLocale', 'getLocaleName'));
    }
}
