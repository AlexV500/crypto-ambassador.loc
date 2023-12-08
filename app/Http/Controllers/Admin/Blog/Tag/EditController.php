<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Models\Blog\Tag;

class EditController extends AdminBlogController{

    public function __invoke(Tag $tag){

        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.blog.tag.edit', compact('tag', 'getCurrentLocale',
            'getLocaleName',
            'locales'));
    }
}
