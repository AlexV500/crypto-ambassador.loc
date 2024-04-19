<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Http\Requests\Admin\Menu\MenuItem\UpdateRequest;
use App\Models\Menu\MenuItem;

class UpdateController extends BaseController{

    public function __invoke(UpdateRequest $request, MenuItem $menuItem){

        $data = $request->validated();
        $oldMenuItemBindType = $menuItem->menu_item_bind_type;
        $menuItem->update($data);

        $addViewVariables = [
            'menuWidget' => $menuItem->getMenuWidget(),
            'menuItem' => $menuItem
        ];

        if($oldMenuItemBindType == $request->input('menu_item_bind_type')){
            return view('admin.menu.menuitem.show', $this->mergeViewVariables($addViewVariables));
        }
        else {
            return redirect()->route('admin.menu.menuitem.binding', $menuItem);
        }


    }
}
