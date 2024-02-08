<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;

class EditController extends Controller{

    public function __invoke(Category $category){

        return view('admin.blog.category.edit', compact('category'));
    }
}
