<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Models\Menu\MenuWidget;

class IndexController extends BaseController{

    public function __invoke(MenuWidget $menuWidget){

        $addViewVariables = [
            'menuBindTypes' => $this->getMenuItemBindTypes(),
            'menuTypes' => $this->getMenuItemTypes(),
            'menuItems' => $menuWidget->getItems(),
            'menuWidget' => $menuWidget
        ];

        return view('admin.menu.menuitem.index', $this->mergeViewVariables($addViewVariables));
    }
}
