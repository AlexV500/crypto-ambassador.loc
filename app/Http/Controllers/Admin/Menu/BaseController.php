<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\SiteController;
use App\Models\Menu\MenuItem;
use App\Models\Menu\MenuWidget;
use App\Services\Admin\MenuService;


class BaseController extends SiteController{

    public $service;

    public function __construct(MenuService $service){
        parent::__construct();
        $this->service = $service;
    }

    public function getMenuWidget($widgetId){

        return MenuWidget::where('id', '=', $widgetId)->first();
    }

    public function getParentItem($parentId){

        return MenuItem::where('id', '=', $parentId)->first();
    }


}
