<?php

namespace App\Http\Controllers\Admin\Snippets;

use App\Http\Controllers\SiteController;
use App\Models\Snippet;

class CreateController extends BaseController{

    public function __invoke(){

        $getCurrentLocale = $this->getCurrentLocale();
        $defaultLocale = $this->getDefaultLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $snippets = $this->getSnippetsWhithDefaultLocale();

        return view('admin.snippets.create', compact( 'snippets','locales', 'getCurrentLocale', 'getLocaleName', 'defaultLocale'));
    }
}
