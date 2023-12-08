<?php

namespace App\Http\Controllers\Admin\Menu\MenuWidget;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menu\MenuWidget\StoreRequest;
use App\Models\Menu\MenuWidget;

class StoreController extends Controller{

    public function __invoke(StoreRequest $request){
        $data = $request->validated();

        MenuWidget::create($data);
        return redirect()->route('admin.menu.menuwidget.index');
    }
}
