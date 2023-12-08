<?php

namespace App\Http\Controllers\Blog\Post;

use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Blog\Tag;
use Carbon\Carbon;


class ShowController extends BlogController{

    public function __invoke(Post $post){

        $categories = $this->getCategories();
        $carbon = $this->getCarbon();
        $date = Carbon::parse($post->created_at);
        $isAdmin = $this->isAdmin();
        $likedPosts = $this->getLikedPosts();
        $tags = $this->getTags();
        $postTags = $post->tags;

        $getLocale = $this->getLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $relatedPosts = $this->getRelatedPosts($post);
        return view('blog.post.show', compact('post',
            'carbon',
            'date',
            'relatedPosts',
            'likedPosts',
            'categories',
            'tags',
            'postTags',
            'getLocale',
            'getLocaleName',
            'locales',
            'isAdmin'));
    }
}
