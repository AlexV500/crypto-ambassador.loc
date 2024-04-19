<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuItem;

use App\Helpers\Breadcrumbs\BreadcrumbsHelper;
use App\Helpers\Menu\MenuHelper;
use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;

class EditController extends BaseController{

    public function __invoke(MenuWidget $menuWidget, MenuItem $menuItem){

     //   dd(MenuHelper::treeMenuItems());

    //    dd(BreadcrumbsHelper::treeMenuBreadcrumbs($menuItem));

        $addViewVariables = [
            'treeMenuItems' => MenuHelper::treeMenuItems(),
            'menuItem' => $menuItem,
            'menuBreadcrumbs' => BreadcrumbsHelper::treeMenuBreadcrumbs($menuItem),
            'subMenuBindItemTypes' => $this->getSubMenuItemBindTypes(),
            'menuWidget' => $menuWidget,
            'parentItem' => $menuItem->getParentItem(),
        ];

        return view('admin.menu.submenuitem.edit', $this->mergeViewVariables($addViewVariables));
    }
}
