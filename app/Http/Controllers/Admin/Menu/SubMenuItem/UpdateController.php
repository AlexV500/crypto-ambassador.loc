<?php

namespace App\Http\Controllers\Admin\Menu\SubMenuItem;

use App\Http\Requests\Admin\Menu\SubMenuItem\UpdateRequest;
use App\Models\Menu\MenuItem;

class UpdateController extends BaseController{

    public function __invoke(UpdateRequest $request, MenuItem $menuItem){

        $data = $request->validated();
        $menuWidget = $menuItem->getMenuWidget();
        $parentItem = $menuItem->getParentItem();
        $menuItem->update($data);
        $locales = $this->getAllLocalizations();
        $getLocale = $this->getLocale();
        $getLocaleName = $this->getLocaleName();

        return view('admin.menu.submenuitem.show', compact(
            'menuWidget',
            'parentItem',
            'menuItem',
            'locales',
            'getLocale',
            'getLocaleName'));
    }
}
