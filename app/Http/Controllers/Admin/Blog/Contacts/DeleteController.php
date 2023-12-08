<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;

class DeleteController extends Controller{

    public function __invoke(Category $category){

        $category->delete();
        return redirect()->route('admin.blog.category.index');
    }
}
