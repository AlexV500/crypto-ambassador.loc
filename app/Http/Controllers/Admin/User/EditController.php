<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\SiteController;
use App\Models\User;

class EditController extends SiteController{

    public function __invoke(User $user){

        $roles = User::getRoles();
        $getLocale = $this->getLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.user.edit', compact('user'), compact('roles', 'locales', 'getLocale', 'getLocaleName'));
    }
}
