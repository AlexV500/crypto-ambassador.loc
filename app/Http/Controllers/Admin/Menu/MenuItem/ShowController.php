<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Models\Menu\MenuItem;

class ShowController extends BaseController{

    public function __invoke(MenuItem $menuItem){

        $addViewVariables = [
            'menuWidget' => $menuItem->getMenuWidget(),
            'menuItem' => $menuItem
        ];

        return view('admin.menu.menuitem.show', $this->mergeViewVariables($addViewVariables));
    }
}
