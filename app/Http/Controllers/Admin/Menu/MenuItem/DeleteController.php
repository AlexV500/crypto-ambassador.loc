<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Http\Controllers\Controller;
use App\Models\Menu\MenuItem;

class DeleteController extends Controller{

    public function __invoke(MenuItem $menuItem){

        $menuWidget = $menuItem->getMenuWidget();
        $menuItem->delete();
        return redirect()->route('admin.menu.menuitem.index', $menuWidget->id);
    }
}
