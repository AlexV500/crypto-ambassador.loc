<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\SiteController;
use App\Http\Entities\Site;
use App\Models\Blog\Post;

class IndexController extends SiteController{

    public function __invoke(){

        $posts = Post::where('lang', '=', $this->getCurrentLocale())->get()->take(8);
        return view('main.index', compact('posts'));
    }
}
