<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Http\Controllers\Admin\Menu\AdminMenuController;

class BaseController extends AdminMenuController{

    public function getMenuItemTypes(){

        return config('menu.menuItemTypes');
    }
}


