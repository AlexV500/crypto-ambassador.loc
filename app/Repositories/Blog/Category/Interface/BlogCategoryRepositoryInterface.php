<?php

namespace App\Repositories\Blog\Category\Interface;

use App\Models\Blog\Category;

interface BlogCategoryRepositoryInterface
{
    public function getCategories($lang);

    public function getCategoryPosts($category, $paginate, $publishedOnly = false);

}
