<?php

namespace App\Http\Controllers\Admin\Snippets;

use App\Http\Controllers\SiteController;
use App\Models\Snippet;

class EditController extends BaseController{

    public function __invoke(Snippet $snippet){

        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();

        return view('admin.snippets.edit', compact('snippet', 'locales', 'getCurrentLocale', 'getLocaleName'));
    }
}
