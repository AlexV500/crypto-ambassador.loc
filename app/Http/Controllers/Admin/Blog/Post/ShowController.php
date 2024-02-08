<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Models\Blog\Post;

class ShowController extends AdminBlogController{

    public function __invoke(Post $post){

        $addViewVariables = [
            'post' => $post,
        ];
        return view('admin.blog.post.show', $this->mergeViewVariables($addViewVariables));
    }
}
