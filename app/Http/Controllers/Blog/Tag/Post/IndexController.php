<?php

namespace App\Http\Controllers\Blog\Tag\Post;

use App\Http\Controllers\Blog\BlogController;
use App\Models\Blog\Tag;

class IndexController extends BlogController{

    public function __invoke(Tag $tag){

        $addViewVariables = [
            'tag' => $tag,
            'tags' => $this->getTags(),
            'categories' => $this->getCategories(),
            'posts' => $this->getTagPosts($tag),
            'likedPosts' => $this->getLikedPosts(),
        ];

        return view('blog.tag.post.index', $this->mergeViewVariables($addViewVariables));
    }
}
