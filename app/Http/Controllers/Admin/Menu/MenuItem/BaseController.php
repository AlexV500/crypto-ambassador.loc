<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Http\Controllers\Admin\Menu\AdminMenuController;

class BaseController extends AdminMenuController{

    public function getMenuItemBindTypes(){

        return config('menu.menuItemBindTypes');
    }

    public function getMenuItemTypes(){

        return config('menu.menuItemTypes');
    }
}


