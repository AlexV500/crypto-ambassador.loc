<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuItem;

class CreateController extends BaseSubController{

    public function __invoke($widgetId, $parentId){

        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $menuTypes = $this->getSubMenuItemTypes();
        $menuWidget = $this->getMenuWidget($widgetId);
        $parentItem = $this->getParentItem($parentId);
        return view('admin.menu.submenuitem.create', compact(
            'menuWidget',
            'parentItem',
            'menuTypes',
            'locales',
            'getCurrentLocale',
            'getLocaleName'));
    }
}
