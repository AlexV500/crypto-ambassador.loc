<?php

namespace App\Http\Controllers\Admin\Menu\MenuWidget;

class CreateController extends BaseController{

    public function __invoke(){

        $addViewVariables = [
            'positions' => $this->getMenuWidgetPositions(),
        ];

        return view('admin.menu.menuwidget.create', $this->mergeViewVariables($addViewVariables));
    }
}
