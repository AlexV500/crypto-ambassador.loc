<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Http\Requests\Admin\Menu\MenuItem\UpdateRequest;
use App\Models\Menu\MenuItem;

class UpdateController extends BaseController{

    public function __invoke(UpdateRequest $request, MenuItem $menuItem){

        $data = $request->validated();
        $menuItem->update($data);

        $addViewVariables = [
            'menuWidget' => $menuItem->getMenuWidget(),
            'menuItem' => $menuItem
        ];

        if($this->isBindTypeChanged($request, $menuItem)){
            return $this->redirectToBinding($menuItem);
        } else {
            return view('admin.menu.menuitem.show', $this->mergeViewVariables($addViewVariables));
        }
    }

    private function redirectToBinding($menuItem){
        return redirect()->route('admin.menu.menuitem.binding', $menuItem);
    }
    private function isBindTypeChanged($request, $menuItem){
        $oldMenuItemBindType = $menuItem->menu_item_bind_type;
        return $request->input('menu_item_bind_type') == 'menuItemDropdownTitle' && $oldMenuItemBindType !== $request->input('menu_item_bind_type');
    }
}
