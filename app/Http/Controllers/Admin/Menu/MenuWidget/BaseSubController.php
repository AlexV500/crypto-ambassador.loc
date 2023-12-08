<?php

namespace App\Http\Controllers\Admin\Menu\MenuWidget;

use App\Http\Controllers\Admin\Menu\BaseController;
use App\Http\Controllers\SiteController;
use App\Http\Entities\Site;

class BaseSubController extends SiteController{

    public function getMenuWidgetPositions(){

        return config('menu.menuWidgetPositions');
    }
}


