<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Models\Menu\MenuWidget;

class CreateController extends BaseController{

    public function __invoke($widgetId){

        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $menuTypes = $this->getMenuItemTypes();
        $menuWidget = $this->getMenuWidget($widgetId);
        return view('admin.menu.menuitem.create', compact('menuWidget', 'menuTypes','locales', 'getCurrentLocale', 'getLocaleName'));
    }
}
