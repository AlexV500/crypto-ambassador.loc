<?php

namespace App\Http\Controllers\Blog\Category\Post;

use App\Http\Controllers\Blog\BlogController;
use App\Models\Blog\Category;

class IndexController extends BlogController{

    public function __invoke(Category $category){

        $addViewVariables = [
            'category' => $category,
            'categories' => $this->getCategories(),
            'posts' => $this->getCategoryPosts($category),
            'likedPosts' => $this->getLikedPosts(),
            'tags' => $this->getTags()
        ];

        return view('blog.category.post.index', $this->mergeViewVariables($addViewVariables));
    }
}
