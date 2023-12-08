<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\SiteController;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Blog\Tag;
use Carbon\Carbon;

class BlogController extends SiteController
{
    public function getCarbon(){
        return new Carbon;
    }
    public function getCategories(){
         return Category::where('lang', '=', $this->getCurrentLocale())->get();
    }
    public function getPosts(){
        return Post::where('published', '=', 1)->where('lang', '=', $this->getCurrentLocale())->orderBy('created_at', 'DESC')->paginate(6);
    }
    public function getTagPosts($tag)
    {
        return $tag->tagPosts()->where('published', '=', 1)->paginate(5);
    }
    public function getCategoryPosts($category)
    {
        return $category->categoryPosts()->where('published', '=', 1)->paginate(5);
    }
    public function getLikedPosts(){
        return Post::where('published', '=', 1)->where('lang', '=', $this->getCurrentLocale())->withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
    }
    public function getRelatedPosts($post){
        return Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)->where('lang', '=', $this->getCurrentLocale())
            ->get()
            ->take(3);
    }
    public function getTags(){
        return Tag::where('lang', '=', $this->getCurrentLocale())->get();
    }
}
