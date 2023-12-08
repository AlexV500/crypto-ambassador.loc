<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\SiteController;
use App\Models\Blog\Tag;

class ShowController extends SiteController{

    public function __invoke(Tag $tag){

        $getLocale = $this->getLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.blog.tag.show', compact('tag', 'getLocale',
            'getLocaleName',
            'locales'));
    }
}
