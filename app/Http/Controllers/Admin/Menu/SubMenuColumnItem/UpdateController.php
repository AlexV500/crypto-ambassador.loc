<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

use App\Http\Requests\Admin\Menu\MenuItem\UpdateRequest;
use App\Models\Menu\MenuItem;

class UpdateController extends BaseSubController{

    public function __invoke(UpdateRequest $request, MenuItem $menuItem){

        $data = $request->validated();
        $menuItem->update($data);

        $addViewVariables = [
            'menuItem' => $menuItem,
            'menuWidget' => $menuItem->getMenuWidget(),
            'parentItem' => $menuItem->getParentItem(),
        ];

        return view('admin.menu.submenucolumnitem.show', $this->mergeViewVariables($addViewVariables));
    }
}
