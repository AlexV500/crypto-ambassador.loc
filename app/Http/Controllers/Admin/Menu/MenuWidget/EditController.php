<?php

namespace App\Http\Controllers\Admin\Menu\MenuWidget;

use App\Models\Menu\MenuWidget;

class EditController extends BaseController{

    public function __invoke(MenuWidget $menuWidget){

        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $positions = $this->getMenuWidgetPositions();
//        dd($menuWidget);
        return view('admin.menu.menuwidget.edit', compact('menuWidget', 'locales', 'getCurrentLocale', 'getLocaleName', 'positions'));
    }
}
