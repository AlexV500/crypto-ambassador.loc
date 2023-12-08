<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\SiteController;
use App\Models\Contact;

class ShowController extends SiteController{

    public function __invoke(Category $category){

//        $categories = Category::all();
        return view('admin.blog.category.show', compact('category'));
    }
}
