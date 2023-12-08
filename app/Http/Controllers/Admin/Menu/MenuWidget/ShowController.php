<?php

namespace App\Http\Controllers\Admin\Menu\MenuWidget;

use App\Models\Menu\MenuWidget;

class ShowController extends BaseSubController{

    public function __invoke(MenuWidget $menuWidget){

        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $position = $this->getMenuWidgetPositions()[$menuWidget->position]['name'];
        return view('admin.menu.menuwidget.show', compact('menuWidget', 'locales', 'getLocaleName', 'position'));
    }
}
