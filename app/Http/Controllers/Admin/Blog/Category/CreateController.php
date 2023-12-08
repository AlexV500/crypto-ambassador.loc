<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\SiteController;

class CreateController extends SiteController{

    public function __invoke(){

        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.blog.category.create', compact( 'locales', 'getCurrentLocale', 'getLocaleName'));
    }
}
