<?php

namespace App\Http\Controllers\Admin\Menu\MenuWidget;

use App\Models\Menu\MenuWidget;

class EditController extends BaseController{

    public function __invoke(MenuWidget $menuWidget){

        $addViewVariables = [
            'positions' => $this->getMenuWidgetPositions(),
            'menuWidget' => $menuWidget,
        ];
//        dd($menuWidget);
        return view('admin.menu.menuwidget.edit', $this->mergeViewVariables($addViewVariables));
    }
}
