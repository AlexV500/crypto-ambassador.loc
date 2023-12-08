<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;

class ShowController extends Controller{

    public function __invoke(Category $category){

//        $categories = Category::all();
        return view('admin.blog.category.show', compact('category'));
    }
}
