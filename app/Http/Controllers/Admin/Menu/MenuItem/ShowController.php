<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Models\Menu\MenuItem;

class ShowController extends BaseController{

    public function __invoke(MenuItem $menuItem){

        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $menuWidget = $menuItem->getMenuWidget();

        return view('admin.menu.menuitem.show', compact('menuWidget','menuItem', 'locales', 'getLocaleName'));
    }
}
