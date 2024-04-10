<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;

class CreateController extends BaseController{

    public function __invoke($widgetId, $parentId){

        $addViewVariables = [
            'parentItem' => $this->getParentItem($parentId),
            'menuTypes' => $this->getMenuItemTypes(),
            'menuWidget' => $this->getMenuWidget($widgetId),
        ];

        return view('admin.menu.submenucolumnitem.create', $this->mergeViewVariables($addViewVariables));
    }
}
