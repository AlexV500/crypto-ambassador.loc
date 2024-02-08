<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Controller;

class CreateController extends Controller{

    public function __invoke(){

        return view('admin.blog.category.create');
    }
}
