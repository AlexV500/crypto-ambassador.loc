<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Models\Menu\MenuItem;

class EditController extends BaseController{

    public function __invoke(MenuItem $menuItem){

        $addViewVariables = [
            'menuBindItemTypes' => $this->getMenuItemBindTypes(),
            'menuItemTypes' => $this->getMenuItemTypes(),
            'menuWidget' => $menuItem->getMenuWidget(),
            'menuItem' => $menuItem,
        ];

        return view('admin.menu.menuitem.edit', $this->mergeViewVariables($addViewVariables));
    }
}
