<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuItem;

use App\Http\Controllers\Admin\Menu\AdminMenuController;

class BaseController extends AdminMenuController{

    public function getSubMenuItemBindTypes(){

        return config('menu.subMenuItemBindType');
    }
}


