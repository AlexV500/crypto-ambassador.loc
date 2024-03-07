<?php

namespace App\Repositories\Blog\Category;

use App\Models\Blog\Category;
use App\Repositories\Blog\Category\Interface\BlogCategoryRepositoryInterface;
use App\Repositories\Blog\Interface\GetTranslatedArticlesInterface;

class BlogCategoryRepository implements BlogCategoryRepositoryInterface, GetTranslatedArticlesInterface
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

    public function getAllTranslatedArticles($uri)
    {
        // dd($uri);
        $originalPost = Category::where('uri', $uri)->firstOrFail();
        $translatedPosts = Category::where('original_content_id', $originalPost->original_content_id);
        return $translatedPosts;
    }

    public function getOriginalContentId($uri)
    {
        // dd($uri);
        $post = Category::where('uri', $uri)->firstOrFail();
        return $post->original_content_id;
    }

    public function countTranslatedArticle($originalContentId, $lang)
    {
        return Category::where('original_content_id', $originalContentId)->locale($lang)->count();
    }

    public function getTranslatedArticle($originalContentId, $lang)
    {
        return Category::where('original_content_id', $originalContentId)->locale($lang)->first();
    }
}
