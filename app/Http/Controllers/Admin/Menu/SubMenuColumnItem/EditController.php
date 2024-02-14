<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

use App\Models\Menu\MenuItem;

class EditController extends BaseController{

    public function __invoke(MenuItem $menuItem){

        $menuWidget = $menuItem->getMenuWidget();
        $menuTypes = $this->getSubMenuColumnItemTypes();
        $locales = $this->getAllLocalizations();
        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();

        return view('admin.menu.submenucolumnitem.edit', compact(
            'menuWidget',
            'menuItem',
            'menuTypes',
            'locales',
            'getCurrentLocale',
            'getLocaleName'));
    }
}
