<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Http\Controllers\SiteController;
use App\Models\Blog\Category;

class IndexController extends AdminBlogController{

    public function __invoke(){

        $categories = $this->getCategories();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.blog.category.index', compact('categories', 'locales', 'getLocaleName'));
    }
}
