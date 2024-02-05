<?php

namespace App\Repositories\Blog\Post\Interface;

interface BlogPostRepositoryInterface
{
    public function getPosts(string $lang, int $paginate, bool $publishedOnly = false);

    public function takePosts(string $lang, int $take);

    public function getLikedPosts(string $lang, int $take, bool $publishedOnly = false);

    public function getRelatedPosts(object $post, string $lang, int $take, bool $publishedOnly = false);

}
