<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Models\Blog\Post;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class IndexController extends AdminBlogController{

    public function __invoke(){

        $posts = $this->getPosts();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        Session::put('locale', 'fr');
    //    App::setLocale('fr');
        return redirect()->route('admin');

//        return view('admin.blog.post.index', compact(
//            'posts',
//            'getLocaleName',
//            'locales'));
    }
}
