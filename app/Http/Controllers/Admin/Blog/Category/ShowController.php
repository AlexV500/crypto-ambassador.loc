<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\SiteController;
use App\Models\Blog\Category;

class ShowController extends SiteController{

    public function __invoke(Category $category){

        $addViewVariables = [
            'category' => $category,
        ];
        return view('admin.blog.category.show', $this->mergeViewVariables($addViewVariables));
    }
}
