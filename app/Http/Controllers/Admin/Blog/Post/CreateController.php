<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use Carbon\Carbon;

class CreateController extends AdminBlogController{

    public function __invoke(){

        $categories = $this->getCategories();
        $tags = $this->getTags();
        $customDate = Carbon::now();
        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();

        return view('admin.blog.post.create', compact(
            'categories',
            'customDate',
            'tags',
            'getCurrentLocale',
            'getLocaleName',
            'locales'));
    }

    private function getOriginalContent(){}
}
