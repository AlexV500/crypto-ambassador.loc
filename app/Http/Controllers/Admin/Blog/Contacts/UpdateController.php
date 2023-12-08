<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Category\UpdateRequest;
use App\Models\Blog\Category;

class UpdateController extends Controller{

    public function __invoke(UpdateRequest $request, Category $category){

        $data = $request->validated();
        $category->update($data);
        return view('admin.blog.category.show', compact('category'));
    }
}
