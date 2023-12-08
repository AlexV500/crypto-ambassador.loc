<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\SiteController;
use App\Models\Blog\Category;

class ShowController extends SiteController{

    public function __invoke(Category $category){

        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.blog.category.show', compact('category', 'locales', 'getLocaleName'));
    }
}
