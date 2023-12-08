<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\SiteController;
use App\Models\User;

class IndexController extends SiteController{

    public function __invoke(){

        $users = User::all();
        $getLocale = $this->getLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.user.index', compact('users', 'locales', 'getLocale', 'getLocaleName'));
    }
}
