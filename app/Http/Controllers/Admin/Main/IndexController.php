<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Models\User;

class IndexController extends AdminBlogController{

    public function __invoke(){

        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['postsCount'] = $this->getPosts()->count();
        $data['categoriesCount'] = $this->getCategories()->count();
        $data['tagsCount'] = $this->getTags()->count();

        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();

//        $array = [$getLocale, $this->siteEntity->getConfigLocale()];
//        dd($array);

        return view('admin.main.index', compact('data', 'locales', 'getLocaleName'));
    }
}
