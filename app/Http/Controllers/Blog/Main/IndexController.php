<?php

namespace App\Http\Controllers\Blog\Main;

use App\Http\Controllers\Blog\BlogController;

class IndexController extends BlogController{

    public function __invoke(){

        $addViewVariables = [
            'categories' => $this->getCategories(),
            'posts' => $this->getPosts(),
            'likedPosts' => $this->getLikedPosts(),
            'tags' => $this->getTags()
        ];

        return view('blog.main.index', $this->mergeViewVariables($addViewVariables));
    }

//    public function getPostsNextRowById(){
//        return Post::where('published', '=', 1)->where('lang', '=', $this->getCurrentLocale())->where('id', '<', '10')->min('id');
//    }
}
