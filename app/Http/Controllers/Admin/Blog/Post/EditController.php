<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Models\Blog\Post;

class EditController extends AdminBlogController{

    public function __invoke(Post $post){

        $addViewVariables = [
            'categories' => $this->getCategories(),
            'tags' => $this->getTags(),
            'post' => $post,
        ];

        return view('admin.blog.post.edit', $this->mergeViewVariables($addViewVariables));
    }
}
