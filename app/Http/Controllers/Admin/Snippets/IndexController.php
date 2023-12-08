<?php

namespace App\Http\Controllers\Admin\Snippets;

use App\Http\Controllers\SiteController;
use App\Models\Snippet;

class IndexController extends BaseController{

    public function __invoke(){

        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $snippets = $this->getSnippets();
        return view('admin.snippets.index', compact('snippets', 'locales', 'getLocaleName'));
    }
}
