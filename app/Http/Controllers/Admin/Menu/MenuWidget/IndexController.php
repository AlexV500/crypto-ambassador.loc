<?php

namespace App\Http\Controllers\Admin\Menu\MenuWidget;

use App\Models\Menu\MenuWidget;

class IndexController extends BaseController{

    public function __invoke(){

        $addViewVariables = [
            'positions' => $this->getMenuWidgetPositions(),
            'menuWigets' => MenuWidget::where('lang', '=', $this->getCurrentLocale())->orderBy("position", "desc")->get(),
        ];

        return view('admin.menu.menuwidget.index', $this->mergeViewVariables($addViewVariables));
    }
}
