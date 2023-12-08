<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuItem;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menu\SubMenuItem\StoreRequest;
use App\Models\Menu\MenuItem;

class StoreController extends Controller{

    public function __invoke(StoreRequest $request){

        $data = $request->validated();
        MenuItem::create($data);
        return redirect()->route('admin.menu.submenuitem.index', [$request->input('menu_widget_id'), $request->input('parent_id')]);
    }
}
