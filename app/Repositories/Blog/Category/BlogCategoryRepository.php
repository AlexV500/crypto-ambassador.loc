<?php

namespace App\Repositories\Blog\Category;

use App\Models\Blog\Category;
use App\Repositories\Blog\Category\Interface\BlogCategoryRepositoryInterface;

class BlogCategoryRepository implements BlogCategoryRepositoryInterface
{
    public function countCategories($lang, $publishedOnly = false)
    {
        return Category::locale($lang)->count();
    }

    public function getCategories($lang, $publishedOnly = false)
    {
        return Category::locale($lang)->get();
    }

    public function countCategoryPosts(Category $category, $paginate, $publishedOnly = false)
    {
        if ($publishedOnly) {
            return $category->categoryPosts()->published()->count();
        }
        return $category->categoryPosts()->count();
    }

    public function getCategoryPosts(Category $category, $paginate, $publishedOnly = false)
    {
        if ($publishedOnly) {
            return $category->categoryPosts()->published()->paginate($paginate);
        }
        return $category->categoryPosts()->paginate($paginate);
    }

}
