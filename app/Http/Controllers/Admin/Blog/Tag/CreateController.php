<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Admin\Blog\AdminBlogController;

class CreateController extends AdminBlogController{

    public function __invoke(){

        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.blog.tag.create', compact('getCurrentLocale',
            'getLocaleName',
            'locales'));
    }
}
