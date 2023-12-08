<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Models\Page;

class EditController extends BaseController{

    public function __invoke(Page $page){

        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();

        return view('admin.pages.edit', compact('page', 'locales', 'getCurrentLocale', 'getLocaleName'));
    }
}
