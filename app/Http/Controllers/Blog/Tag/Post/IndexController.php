<?php

namespace App\Http\Controllers\Blog\Tag\Post;

use App\Http\Controllers\Blog\BlogController;
use App\Models\Blog\Tag;

class IndexController extends BlogController{

    public function __invoke(Tag $tag){

        $categories = $this->getCategories();
        $carbon = $this->getCarbon();
        $tags = $this->getTags();
        $posts = $this->getTagPosts($tag);
        $likedPosts = $this->getLikedPosts();
        $getLocale = $this->getLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $isAdmin = $this->isAdmin();

        return view('blog.tag.post.index', compact('posts', 'carbon', 'tags', 'tag', 'likedPosts', 'categories', 'getLocale',
            'getLocaleName',
            'locales',
            'isAdmin'));
    }
}
