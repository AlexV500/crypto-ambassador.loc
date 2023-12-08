<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Http\Controllers\Admin\Menu\BaseController;

class BaseSubController extends BaseController{

    public function getMenuItemTypes(){

        return config('menu.menuItemTypes');
    }
}


