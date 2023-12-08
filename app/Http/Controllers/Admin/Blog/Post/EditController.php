<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Models\Blog\Post;

class EditController extends AdminBlogController{

    public function __invoke(Post $post){

        $categories = $this->getCategories();
        $tags = $this->getTags();
        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();

        return view('admin.blog.post.edit', compact(
            'post',
            'categories',
            'tags',
            'getCurrentLocale',
            'getLocaleName',
            'locales'));
    }
}
