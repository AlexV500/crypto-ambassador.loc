<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\SiteController;
use App\Http\Requests\Admin\Blog\Category\UpdateRequest;
use App\Models\Blog\Category;

class UpdateController extends SiteController{

    public function __invoke(UpdateRequest $request, Category $category){

        $data = $request->validated();
        $category->update($data);
        $addViewVariables = [
            'category' => $category,
        ];
        return view('admin.blog.category.show', $this->mergeViewVariables($addViewVariables));
    }
}
