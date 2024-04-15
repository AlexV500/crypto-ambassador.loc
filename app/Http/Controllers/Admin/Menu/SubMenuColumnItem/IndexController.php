<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;

class IndexController extends BaseController{

    public function __invoke(MenuWidget $menuWidget, MenuItem $parentItem){

        $addViewVariables = [
            'subMenuBindItemTypes' => $this->getSubMenuBindItemTypes(),
            'menuItems' => $parentItem->child(),
            'menuWidget' => $menuWidget
        ];

        return view('admin.menu.submenucolumnitem.index', $this->mergeViewVariables($addViewVariables));
    }
}
