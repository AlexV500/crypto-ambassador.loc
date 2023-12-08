<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Models\Blog\Post;

class DeleteController extends BaseController{

    public function __invoke(Post $post){

        $post->delete();
        return redirect()->route('admin.blog.post.index');
    }
}
