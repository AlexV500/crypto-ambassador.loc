<?php

namespace App\Http\Controllers\Admin\Menu\MenuWidget;

use App\Http\Controllers\Controller;
use App\Models\Menu\MenuWidget;

class DeleteController extends Controller{

    public function __invoke(MenuWidget $menuWidget){

        $menuWidget->delete();
        return redirect()->route('admin.menu.menuwidget.index');
    }
}
