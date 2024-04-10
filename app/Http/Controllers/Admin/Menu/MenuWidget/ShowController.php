<?php

namespace App\Http\Controllers\Admin\Menu\MenuWidget;

use App\Models\Menu\MenuWidget;

class ShowController extends BaseController{

    public function __invoke(MenuWidget $menuWidget){

        $addViewVariables = [
            'position' => $this->getMenuWidgetPositions()[$menuWidget->position]['name'],
        ];

        return view('admin.menu.menuwidget.show', $this->mergeViewVariables($addViewVariables));
    }
}
