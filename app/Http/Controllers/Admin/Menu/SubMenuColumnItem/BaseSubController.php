<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

use App\Http\Controllers\Admin\Menu\BaseController;

class BaseSubController extends BaseController{

    public function getSubMenuColumnItemTypes(){

        return config('menu.subMenuColumnItemTypes');
    }
}


