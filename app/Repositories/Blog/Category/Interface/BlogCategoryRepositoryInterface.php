<?php

namespace App\Repositories\Blog\Category\Interface;

use App\Models\Blog\Category;

interface BlogCategoryRepositoryInterface
{
    public function getCategories(string $lang, bool $publishedOnly = false);

    public function countCategories(string $lang, bool $publishedOnly = false);

    public function countCategoryPosts(Category $category, bool $publishedOnly = false);

    public function getCategoryPosts(Category $category, int $paginate, bool $publishedOnly = false);
}
