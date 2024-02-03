<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

class IndexController extends BaseController{

    public function __invoke(){

        $tags = $this->getTags();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.blog.tag.index', compact(
            'tags',
            'getLocaleName',
            'locales'));
    }
}
