<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuItem;

use App\Http\Controllers\Admin\Menu\BaseController;

class BaseSubController extends BaseController{

    public function getSubMenuItemTypes(){

        return config('menu.subMenuItemTypes');
    }
}


