<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\SiteController;

class CreateController extends SiteController{

    public function __invoke(){

        return view('admin.blog.category.create', $this->getViewVariables());
    }
}
