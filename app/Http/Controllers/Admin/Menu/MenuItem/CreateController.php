<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;


class CreateController extends BaseController{

    public function __invoke($widgetId){

        $addViewVariables = [
            'menuBindTypes' => $this->getMenuItemBindTypes(),
            'menuWidget' => $this->getMenuWidget($widgetId),
        ];

        return view('admin.menu.menuitem.create', $this->mergeViewVariables($addViewVariables));
    }
}
