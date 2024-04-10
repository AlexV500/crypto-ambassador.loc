<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

use App\Models\Menu\MenuItem;

class ShowController extends BaseController{

    public function __invoke(MenuItem $menuItem){

        $addViewVariables = [
            'menuItem' => $menuItem,
            'menuWidget' => $menuItem->getMenuWidget(),
            'parentItem' => $menuItem->getParentItem(),
        ];

        return view('admin.menu.submenucolumnitem.show', $this->mergeViewVariables($addViewVariables));
    }
}
