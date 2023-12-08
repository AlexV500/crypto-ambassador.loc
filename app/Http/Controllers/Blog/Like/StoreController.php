<?php

namespace App\Http\Controllers\Blog\Like;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;

class StoreController extends Controller{

    public function __invoke(Post $post){

        auth()->user()->likedPosts()->toggle($post->id);
        return redirect()->route('blog.post.show', $post->uri);
    }
}
