<?php

namespace App\Repositories\Blog\Tag\Interface;

interface BlogTagRepositoryInterface
{
    public function getTags($lang);

    public function countTags($lang);

    public function getTagPosts($tag, $paginate, $publishedOnly = false);

}
