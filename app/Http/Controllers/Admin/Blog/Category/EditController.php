<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\SiteController;
use App\Models\Blog\Category;

class EditController extends SiteController{

    public function __invoke(Category $category){

        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.blog.category.edit', compact('category', 'locales', 'getCurrentLocale', 'getLocaleName'));
    }
}
