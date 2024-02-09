<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Admin\Blog\AdminBlogController;

class CreateController extends AdminBlogController{

    public function __invoke(){

        return view('admin.blog.tag.create', $this->getViewVariables());
    }
}
