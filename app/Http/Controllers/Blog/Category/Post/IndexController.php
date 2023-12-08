<?php

namespace App\Http\Controllers\Blog\Category\Post;

use App\Http\Controllers\Blog\BlogController;
use App\Models\Blog\Category;

class IndexController extends BlogController{

    public function __invoke(Category $category){

        $tags = $this->getTags();
        $carbon = $this->getCarbon();
        $categories = $this->getCategories();
        $isAdmin = $this->isAdmin();
        $posts = $this->getCategoryPosts($category);
        $likedPosts = $this->getLikedPosts();
        $getLocale = $this->getLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('blog.category.post.index', compact('posts',
            'carbon',
            'categories',
            'likedPosts',
            'tags',
            'getLocale',
            'getLocaleName',
            'locales',
            'isAdmin'
        ));
    }
}
