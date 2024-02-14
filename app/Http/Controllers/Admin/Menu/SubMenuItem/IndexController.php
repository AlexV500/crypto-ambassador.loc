<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuItem;

use App\Helpers\Breadcrumbs\BreadcrumbsHelper;
use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;

class IndexController extends BaseController{

    public function __invoke(MenuWidget $menuWidget, MenuItem $parentItem){

      //  dd($menuWidget);

        $menuBreadcrumbs = BreadcrumbsHelper::treeMenuBreadcrumbs($parentItem);
        $menuItems = $parentItem->getMenuItemsChild();
        $menuTypes = $this->getSubMenuItemTypes();
        $locales = $this->getAllLocalizations();
        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();

        return view('admin.menu.submenuitem.index', compact(
            'menuWidget',
            'parentItem',
            'menuBreadcrumbs',
            'menuItems',
            'menuTypes',
            'locales',
            'getCurrentLocale',
            'getLocaleName'));
    }
}
