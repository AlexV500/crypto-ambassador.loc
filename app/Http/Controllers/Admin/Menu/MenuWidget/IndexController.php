<?php

namespace App\Http\Controllers\Admin\Menu\MenuWidget;

use App\Models\Menu\MenuWidget;

class IndexController extends BaseController{

    public function __invoke(){

        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $menuWigets = MenuWidget::where('lang', '=', $this->getCurrentLocale())->orderBy("position", "desc")->get();
        $positions = $this->getMenuWidgetPositions();
        return view('admin.menu.menuwidget.index', compact( 'locales', 'getCurrentLocale', 'getLocaleName', 'menuWigets', 'positions'));
    }
}
