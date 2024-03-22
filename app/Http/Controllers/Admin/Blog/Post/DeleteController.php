<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Models\Blog\Post;
use App\Http\Controllers\Controller;

class DeleteController extends Controller{

    public function __invoke(Post $post){

        $post->delete();
        return redirect()->route('admin.blog.post.index');
    }
}
