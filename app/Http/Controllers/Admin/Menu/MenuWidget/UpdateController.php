<?php

namespace App\Http\Controllers\Admin\Menu\MenuWidget;

use App\Http\Requests\Admin\Menu\MenuWidget\UpdateRequest;
use App\Models\Menu\MenuWidget;

class UpdateController extends BaseSubController{

    public function __invoke(UpdateRequest $request, MenuWidget $menuWidget){

        $data = $request->validated();
        $menuWidget->update($data);
        $getLocale = $this->getLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $position = $this->getMenuWidgetPositions()[$menuWidget->position];
        return view('admin.menu.menuwidget.show', compact('menuWidget', 'locales', 'getLocale', 'getLocaleName', 'position'));
    }
}
