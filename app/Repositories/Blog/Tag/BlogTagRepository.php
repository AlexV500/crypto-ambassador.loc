<?php

namespace App\Repositories\Blog\Tag;

use App\Models\Blog\Tag;
use App\Repositories\Blog\Interface\GetTranslatedArticlesInterface;
use App\Repositories\Blog\Tag\Interface\BlogTagRepositoryInterface;

class BlogTagRepository implements BlogTagRepositoryInterface, GetTranslatedArticlesInterface
{
    public function getTags($lang){
        return Tag::locale($lang)->get();
    }

    public function countTags($lang){
        return Tag::locale($lang)->count();
    }

    public function getTagPosts($tag, $paginate, $publishedOnly = false)
    {
        if($publishedOnly){
            return $tag->tagPosts()->published()->paginate($paginate);
        }
        return $tag->tagPosts()->paginate($paginate);
    }

    public function getAllTranslatedArticles($uri)
    {
        // dd($uri);
        $originalPost = Tag::where('uri', $uri)->firstOrFail();
        $translatedPosts = Tag::where('original_content_id', $originalPost->original_content_id);
        return $translatedPosts;
    }

    public function getOriginalContentId($uri)
    {
        // dd($uri);
        $post = Tag::where('uri', $uri)->firstOrFail();
        return $post->original_content_id;
    }

    public function countTranslatedArticle($originalContentId, $lang)
    {
        return Tag::where('original_content_id', $originalContentId)->locale($lang)->count();
    }

    public function getTranslatedArticle($originalContentId, $lang)
    {
        return Tag::where('original_content_id', $originalContentId)->locale($lang)->first();
    }
}
