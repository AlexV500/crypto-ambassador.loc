<?php

namespace App\Repositories\Blog\Tag;

use App\Models\Blog\Tag;
use App\Repositories\Blog\Tag\Interface\BlogTagRepositoryInterface;

class BlogTagRepository implements BlogTagRepositoryInterface
{
    public function getTags($lang){
        return Tag::locale($lang)->get();
    }

    public function getTagPosts($tag, $paginate, $publishedOnly = false)
    {
        if($publishedOnly){
            return $tag->tagPosts()->published()->paginate($paginate);
        }
        return $tag->tagPosts()->paginate($paginate);
    }
}
