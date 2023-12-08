<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Post;

class IndexController extends BlogController{

    public function __invoke(){

        //    $posts = Post::all()->take(6);
        $categories = $this->getCategories();
        $carbon = $this->getCarbon();
        $posts = $this->getPosts();
        $likedPosts = $this->getLikedPosts();
        $tags = $this->getTags();
        $getLocale = $this->getLocale();
        $getLocaleName = $this->getLocaleName();
        $isAdmin = $this->isAdmin();
        $locales = $this->getAllLocalizations();
        return view('blog.index', compact(
            'posts',
            'carbon',
            'likedPosts',
            'categories',
            'tags',
            'getLocale',
            'getLocaleName',
            'locales',
            'isAdmin'
        ));
    }

    public function getPostsNextRowById(){
        return Post::where('published', '=', 1)->where('lang', '=', $this->getCurrentLocale())->where('id', '<', '10')->min('id');
    }
}
