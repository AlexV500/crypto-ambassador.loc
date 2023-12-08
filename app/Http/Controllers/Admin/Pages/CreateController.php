<?php

namespace App\Http\Controllers\Admin\Pages;

class CreateController extends BaseController{

    public function __invoke(){

        $getCurrentLocale = $this->getCurrentLocale();
        $defaultLocale = $this->getDefaultLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $pages = $this->getSnippetsWhithDefaultLocale();

        return view('admin.pages.create', compact( 'pages','locales', 'getCurrentLocale', 'getLocaleName', 'defaultLocale'));
    }
}
