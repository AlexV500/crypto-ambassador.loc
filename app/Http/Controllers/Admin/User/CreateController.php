<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use App\Models\User;

class CreateController extends SiteController{

    public function __invoke(){

        $roles = User::getRoles();
        $getLocale = $this->getLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.user.create', compact('roles', 'locales', 'getLocale', 'getLocaleName'));
    }
}
