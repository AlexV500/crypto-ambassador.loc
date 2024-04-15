<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Http\Requests\Admin\Menu\MenuItem\BindRequest;
use App\Models\Menu\MenuItem;

class BindItemController extends BaseController
{
    public function __invoke(BindRequest $request, MenuItem $menuItem){

        $data = $request->validated();
        $menuItem->update($data);

        $addViewVariables = [
            'menuWidget' => $menuItem->getMenuWidget(),
        ];

        return view('admin.menu.menuitem.show', $this->mergeViewVariables($addViewVariables));
    }
}
