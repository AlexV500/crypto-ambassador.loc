<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\SiteController;
use App\Models\Page;

class ShowController extends SiteController{

    public function __invoke(Page $page){

        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.pages.show', compact('page', 'locales', 'getLocaleName'));
    }
}
