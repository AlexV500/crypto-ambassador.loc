<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuItem;

use App\Helpers\Breadcrumbs\BreadcrumbsHelper;
use App\Helpers\Menu\MenuHelper;
use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;

class EditController extends BaseSubController{

    public function __invoke(MenuWidget $menuWidget, MenuItem $menuItem){

     //   dd(MenuHelper::treeMenuItems());

    //    dd(BreadcrumbsHelper::treeMenuBreadcrumbs($menuItem));

        $treeMenuItems = MenuHelper::treeMenuItems();
        $menuBreadcrumbs = BreadcrumbsHelper::treeMenuBreadcrumbs($menuItem);
        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $menuTypes = $this->getSubMenuItemTypes();
        $parentItem = $menuItem->getParentItem();

        return view('admin.menu.submenuitem.edit', compact(
            'menuWidget',
            'parentItem',
            'menuBreadcrumbs',
            'treeMenuItems',
            'menuItem',
            'menuTypes',
            'locales',
            'getCurrentLocale',
            'getLocaleName'));
    }
}
