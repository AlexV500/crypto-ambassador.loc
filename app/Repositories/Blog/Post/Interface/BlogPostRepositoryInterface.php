<?php

namespace App\Repositories\Blog\Post\Interface;

use App\Models\Blog\Post;
interface BlogPostRepositoryInterface
{

    public function countPosts($lang, $publishedOnly = false);

    public function getPosts(string $lang, int $paginate, bool $publishedOnly = false);

    public function takePosts(string $lang, int $take);

    public function getLikedPosts(string $lang, int $take, bool $publishedOnly = false);

    public function getRelatedPosts(Post $post, string $lang, int $take, bool $publishedOnly = false);

}
