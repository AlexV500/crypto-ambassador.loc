<?php

namespace App\Http\Controllers\Admin\Blog\Post;


class IndexController extends BaseController{

    public function __invoke(){

        $posts = $this->getPosts();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.blog.post.index', compact(
            'posts',
            'getLocaleName',
            'locales'));
    }
}
