<?php

namespace App\Http\Controllers\Admin\Blog\Category;

class IndexController extends BaseController{

    public function __invoke(){

        $addViewVariables = [
            'categories' => $this->getCategories()
        ];
        return view('admin.blog.category.index', $this->mergeViewVariables($addViewVariables));
    }
}
