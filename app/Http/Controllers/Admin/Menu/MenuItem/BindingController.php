<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;


use App\Models\Menu\MenuItem;

class BindingController extends BaseController
{
    public function __invoke(MenuItem $menuItem){

        $addViewVariables = [
            'menuItem' => $menuItem,
            'menuWidget' => $menuItem->getMenuWidget(),
            'menuBindType' => $this->getMenuItemBindTypes()[$menuItem->menu_item_bind_type],
        ];

        return view('admin.menu.menuitem.binding', $this->mergeViewVariables($addViewVariables));
    }

}
