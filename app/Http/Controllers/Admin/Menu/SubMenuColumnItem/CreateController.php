<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;

class CreateController extends BaseController{

    public function __invoke($widgetId, $parentId){

        $menuWidget = $this->getMenuWidget($widgetId);
        $parentItem = $this->getParentItem($parentId);
        $menuTypes = $this->getSubMenuColumnItemTypes();
        $locales = $this->getAllLocalizations();
        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();

        return view('admin.menu.submenucolumnitem.create', compact(
            'menuWidget',
            'parentItem',
            'menuTypes',
            'locales',
            'getCurrentLocale',
            'getLocaleName'));
    }
}
