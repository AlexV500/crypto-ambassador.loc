<?php

namespace App\Repositories\Blog\Category;

use App\Models\Blog\Category;
use App\Repositories\Blog\Category\Interface\BlogCategoryRepositoryInterface;

class BlogCategoryRepository implements BlogCategoryRepositoryInterface
{
    public function getCategories($lang){
        return Category::locale($lang)->get();
    }

    public function getCategoryPosts($category, $paginate, $publishedOnly = false)
    {
        if($publishedOnly){
            return $category->categoryPosts()->published()->paginate($paginate);
        }
        return $category->categoryPosts()->paginate($paginate);
    }
}
