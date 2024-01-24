<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\SiteController;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Blog\Tag;


class AdminBlogController extends SiteController{

    public function __construct(){
        parent::__construct();
    }

    public function getCategories(){
        return Category::where('lang', '=', $this->getCurrentLocale())->get();
    }
    public function getPosts(){
        return Post::where('lang', '=', $this->getCurrentLocale())->paginate(20);
    }
    public function getTags(){
        return Tag::where('lang', '=', $this->getCurrentLocale())->get();
    }

    public function getTagPosts($tag)
    {
        return $tag->tagPosts()->where('published', '=', 1)->paginate(5);
    }
    public function getCategoryPosts($category)
    {
        return $category->categoryPosts()->where('published', '=', 1)->paginate(5);
    }
}
