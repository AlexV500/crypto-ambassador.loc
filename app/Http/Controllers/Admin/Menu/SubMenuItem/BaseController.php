<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuItem;

use App\Http\Controllers\Admin\Menu\AdminMenuController;

class BaseController extends AdminMenuController{

    public function getSubMenuBindItemTypes(){

        return config('menu.subMenuBindItemTypes');
    }
}


