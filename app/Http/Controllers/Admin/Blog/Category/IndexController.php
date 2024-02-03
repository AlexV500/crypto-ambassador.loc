<?php

namespace App\Http\Controllers\Admin\Blog\Category;

class IndexController extends BaseController{

    public function __invoke(){

        $categories = $this->getCategories();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.blog.category.index', compact('categories', 'locales', 'getLocaleName'));
    }
}
