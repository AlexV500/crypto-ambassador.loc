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
        ];

        return view('admin.menu.menuitem.show', $this->mergeViewVariables($addViewVariables));
    }
}
