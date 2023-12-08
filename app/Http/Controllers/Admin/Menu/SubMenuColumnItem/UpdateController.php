<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuColumnItem;

use App\Http\Requests\Admin\Menu\MenuItem\UpdateRequest;
use App\Models\Menu\MenuItem;

class UpdateController extends BaseSubController{

    public function __invoke(UpdateRequest $request, MenuItem $menuItem){

        $data = $request->validated();
        $menuWidget = $menuItem->getMenuWidget();
        $parentItem = $menuItem->getParentItem();
        $menuItem->update($data);
        $locales = $this->getAllLocalizations();
        $getLocale = $this->getLocale();
        $getLocaleName = $this->getLocaleName();

        return view('admin.menu.submenucolumnitem.show', compact(
            'menuWidget',
            'parentItem',
            'menuItem',
            'locales',
            'getLocale',
            'getLocaleName'));
    }
}
