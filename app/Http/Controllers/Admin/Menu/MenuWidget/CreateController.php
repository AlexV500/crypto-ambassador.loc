<?php

namespace App\Http\Controllers\Admin\Menu\MenuWidget;

class CreateController extends BaseController{

    public function __invoke(){

        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $positions = $this->getMenuWidgetPositions();
        return view('admin.menu.menuwidget.create', compact( 'locales', 'getCurrentLocale', 'getLocaleName', 'positions'));
    }
}
