<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Models\Blog\Post;

class ShowController extends AdminBlogController{

    public function __invoke(Post $post){

        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.blog.post.show', compact(
            'post',
                    'getLocaleName',
                    'locales'));
    }
}
