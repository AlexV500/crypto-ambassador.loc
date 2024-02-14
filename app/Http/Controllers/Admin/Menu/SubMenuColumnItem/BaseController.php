<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

use App\Http\Controllers\Admin\Menu\AdminMenuController;

class BaseController extends AdminMenuController{

    public function getSubMenuColumnItemTypes(){

        return config('menu.subMenuColumnItemTypes');
    }
}


