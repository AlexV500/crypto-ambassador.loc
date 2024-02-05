<?php

namespace App\Http\Controllers\Blog\Post;

use App\Http\Controllers\Blog\BlogController;
use App\Models\Blog\Post;
use Carbon\Carbon;


class ShowController extends BlogController{

    public function __invoke(Post $post){

        $addViewVariables = [
            'post' => $post,
            'date' => Carbon::parse($post->created_at),
            'relatedPosts' => $this->getRelatedPosts($post),
            'likedPosts' => $this->getLikedPosts(),
            'categories' => $this->getCategories(),
            'tags' => $this->getTags()
        ];

        return view('blog.post.show', $this->mergeViewVariables($addViewVariables));
    }
}
