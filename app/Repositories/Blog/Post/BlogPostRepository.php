<?php

namespace App\Repositories\Blog\Post;

use App\Models\Blog\Post;
use App\Repositories\Blog\Post\Interface\BlogPostRepositoryInterface;
use App\Repositories\Blog\Interface\GetTranslatedArticlesInterface;
use Illuminate\Support\Str;

class BlogPostRepository implements BlogPostRepositoryInterface, GetTranslatedArticlesInterface
{

    public function countPosts($lang, $publishedOnly = false){
        return Post::locale($lang)->count();
    }

    public function getPosts($lang, $paginate, $publishedOnly = false)
    {
        if ($publishedOnly) {
            return Post::locale($lang)->published()->orderBy('created_at', 'DESC')->paginate($paginate);
        }
        return Post::locale($lang)->orderBy('created_at', 'DESC')->paginate($paginate);
    }

    public function takePosts($lang, $take){
        return Post::locale($lang)->get()->take($take);
    }

    public function getPostsByCategoryId($categoryId, $lang, $paginate = null, $publishedOnly = false)
    {
        $return = Post::locale($lang)->where('category_id', $categoryId);
        if ($publishedOnly) {
            $return = $return->published();
        }
        $return = $return->orderBy('created_at', 'DESC');

        if ($paginate !== null) {
            $return = $return->paginate($paginate);
        }
        return $return;
    }


    public function getLikedPosts($lang, $take, $publishedOnly = false)
    {
        if ($publishedOnly) {
            return Post::locale($lang)->published()->withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take($take);
        }
        return Post::locale($lang)->withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take($take);
    }

    public function getRelatedPosts($post, $lang, $take, $publishedOnly = false)
    {
        if ($publishedOnly) {
            return Post::where('category_id', $post->category_id)
                ->where('id', '!=', $post->id)->locale($lang)->published()
                ->get()
                ->take($take);
        }
        return Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)->locale($lang)
            ->get()
            ->take($take);
    }

    public function getAllTranslatedArticles($uri)
    {
       // dd($uri);
        $originalPost = Post::where('uri', $uri)->firstOrFail();
        $translatedPosts = Post::where('original_content_id', $originalPost->original_content_id);
        return $translatedPosts;
    }

    public function getOriginalContentId($uri)
    {
        // dd($uri);
        $post = Post::where('uri', $uri)->firstOrFail();
        return $post->original_content_id;
    }

    public function countTranslatedArticle($originalContentId, $lang)
    {
        return Post::where('original_content_id', $originalContentId)->locale($lang)->count();
    }

    public function getTranslatedArticle($originalContentId, $lang)
    {
        return Post::where('original_content_id', $originalContentId)->locale($lang)->first();
    }
}
