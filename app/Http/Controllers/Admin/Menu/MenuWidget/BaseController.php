<?php

namespace App\Http\Controllers\Admin\Menu\MenuWidget;

use App\Http\Controllers\Admin\Menu\AdminMenuController;
use App\Http\Controllers\SiteController;
use App\Http\Entities\Site;

class BaseController extends SiteController{

    public function getMenuWidgetPositions(){

        return config('menu.menuWidgetPositions');
    }
}


