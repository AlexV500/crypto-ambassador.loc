<?php

namespace App\Http\Controllers\Admin\Blog\Post;


class IndexController extends BaseController{

    public function __invoke(){

        $addViewVariables = [
            'posts' => $this->getPosts(),
            'blogPostRepository' => $this->blogPostRepository,
        ];
        return view('admin.blog.post.index', $this->mergeViewVariables($addViewVariables));
    }
}
