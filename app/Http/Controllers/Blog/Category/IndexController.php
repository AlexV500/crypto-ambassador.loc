<?php

namespace App\Http\Controllers\Blog\Category;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;

class IndexController extends Controller{

    public function __invoke(){

        $categories = Category::where('lang', '=', $this->getCurrentLocale())->get();
        return view('category.index', compact('categories'));
    }
}
