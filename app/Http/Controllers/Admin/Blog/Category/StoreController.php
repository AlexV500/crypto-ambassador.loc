<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Category\StoreRequest;
use App\Models\Blog\Category;

class StoreController extends Controller{

    public function __invoke(StoreRequest $request){
        $data = $request->validated();

        Category::firstOrCreate($data);
        return redirect()->route('admin.blog.category.index');
    }
}
