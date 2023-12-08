<?php

namespace App\Http\Controllers\Admin\Pages;

class IndexController extends BaseController{

    public function __invoke(){

        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $pages = $this->getSnippets();
        return view('admin.snippets.index', compact('pages', 'locales', 'getLocaleName'));
    }
}
