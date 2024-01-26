<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Models\Blog\Post;

class IndexController extends AdminBlogController{

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
