<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

class CreateController extends BaseController{

    public function __invoke($widgetId, $parentId){

        $addViewVariables = [
            'parentItem' => $this->getParentItem($parentId),
            'subMenuBindItemTypes' => $this->getSubMenuBindItemTypes(),
            'menuWidget' => $this->getMenuWidget($widgetId),
        ];

        return view('admin.menu.submenucolumnitem.create', $this->mergeViewVariables($addViewVariables));
    }
}
