<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

use App\Models\Menu\MenuItem;

class EditController extends BaseController{

    public function __invoke(MenuItem $menuItem){

        $addViewVariables = [
            'menuItem' => $menuItem,
            'menuTypes' => $this->getSubMenuColumnItemTypes(),
            'menuWidget' => $this->getMenuWidget(),
        ];

        return view('admin.menu.submenucolumnitem.edit', $this->mergeViewVariables($addViewVariables));
    }
}
