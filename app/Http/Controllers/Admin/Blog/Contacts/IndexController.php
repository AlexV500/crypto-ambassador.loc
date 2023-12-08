<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;

class IndexController extends Controller{

    public function __invoke(){

        $categories = Category::all();
        return view('admin.blog.category.index', compact('categories'));
    }
}
