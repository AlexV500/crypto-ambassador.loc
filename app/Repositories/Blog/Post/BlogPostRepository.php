<?php

namespace App\Repositories\Blog\Post;

use App\Models\Blog\Post;
use App\Repositories\Blog\Post\Interface\BlogPostRepositoryInterface;

class BlogPostRepository implements BlogPostRepositoryInterface
{
    public function getPosts($lang, $paginate, $publishedOnly = false)
    {
        if ($publishedOnly) {
            return Post::locale($lang)->published()->orderBy('created_at', 'DESC')->paginate($paginate);
        }
        return Post::locale($lang)->orderBy('created_at', 'DESC')->paginate($paginate);
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
}
