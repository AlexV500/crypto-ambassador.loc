<?php

namespace App\Http\Controllers\Admin\Menu\MenuItem;

use App\Http\Requests\Admin\Menu\MenuItem\UpdateRequest;
use App\Models\Menu\MenuItem;

class UpdateController extends BaseController{

    public function __invoke(UpdateRequest $request, MenuItem $menuItem){

        $data = $request->validated();
        $menuWidget = $menuItem->getMenuWidget();
        $menuItem->update($data);
        $getLocale = $this->getLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();

        return view('admin.menu.menuitem.show', compact('menuWidget', 'menuItem', 'locales', 'getLocale', 'getLocaleName'));
    }
}
