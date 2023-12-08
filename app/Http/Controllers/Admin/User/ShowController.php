<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\SiteController;
use App\Models\User;

class ShowController extends SiteController{

    public function __invoke(User $user){

        $getLocale = $this->getLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.user.show', compact('user', 'locales', 'getLocale', 'getLocaleName'));
    }
}
