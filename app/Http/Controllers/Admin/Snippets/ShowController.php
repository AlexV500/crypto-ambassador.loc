<?php

namespace App\Http\Controllers\Admin\Snippets;

use App\Http\Controllers\SiteController;
use App\Models\Snippet;

class ShowController extends SiteController{

    public function __invoke(Snippet $snippet){

        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.snippets.show', compact('snippet', 'locales', 'getLocaleName'));
    }
}
