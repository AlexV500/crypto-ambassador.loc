<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Models\Menu\MenuWidget;

class CreateController extends BaseController{

    public function __invoke($widgetId){

        $addViewVariables = [
            'menuTypes' => $this->getMenuItemTypes(),
            'menuWidget' => $this->getMenuWidget($widgetId),
        ];

        return view('admin.menu.menuitem.create', $this->mergeViewVariables($addViewVariables));
    }
}
