<?php

namespace App\Http\Controllers\Admin\Menu\MenuWidget;

use App\Http\Requests\Admin\Menu\MenuWidget\UpdateRequest;
use App\Models\Menu\MenuWidget;

class UpdateController extends BaseController{

    public function __invoke(UpdateRequest $request, MenuWidget $menuWidget){

        $data = $request->validated();
        $menuWidget->update($data);

        $addViewVariables = [
            'position' => $this->getMenuWidgetPositions()[$menuWidget->position]['name'],
        ];

        return view('admin.menu.menuwidget.show', $this->mergeViewVariables($addViewVariables));
    }
}
