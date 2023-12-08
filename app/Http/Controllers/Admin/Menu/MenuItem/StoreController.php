<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menu\MenuItem\StoreRequest;
use App\Models\Menu\MenuItem;

class StoreController extends Controller{

    public function __invoke(StoreRequest $request){

        $data = $request->validated();
        MenuItem::create($data);
        return redirect()->route('admin.menu.menuitem.index', $request->input('menu_widget_id'));
    }
}
