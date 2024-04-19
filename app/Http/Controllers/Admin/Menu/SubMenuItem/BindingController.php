<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuItem;

use App\Helpers\Breadcrumbs\BreadcrumbsHelper;
use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;

class BindingController extends BaseController
{
    public function __invoke(MenuWidget $menuWidget, MenuItem $menuItem){

        $addViewVariables = [
            'menuBreadcrumbs' => BreadcrumbsHelper::treeMenuBreadcrumbs($menuItem),
            'menuItem' => $menuItem,
            'parentItem' => $menuItem->getParentItem(),
            'menuWidget' => $menuItem->getMenuWidget(),
            'menuBindType' => $this->getSubMenuItemBindTypes()[$menuItem->menu_item_bind_type],
        ];

        return view('admin.menu.submenuitem.binding', $this->mergeViewVariables($addViewVariables));
    }

}
