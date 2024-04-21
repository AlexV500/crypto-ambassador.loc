<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuItem;

use App\Helpers\Breadcrumbs\BreadcrumbsHelper;
use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;

class IndexController extends BaseController{

    public function __invoke(MenuWidget $menuWidget, MenuItem $parentItem){

      //  dd($menuWidget);

        $addViewVariables = [
            'subMenuItemBindType' => $this->getSubMenuItemBindTypes(),
            'menuItems' => $parentItem->getMenuItemsChild(),
            'parentItem' => $parentItem,
            'menuWidget' => $menuWidget
        ];

        return view('admin.menu.submenuitem.index', $this->mergeViewVariables($addViewVariables));
    }
}
