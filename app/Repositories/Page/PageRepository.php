<?php

namespace App\Repositories\Page;

use App\Models\Page;
use App\Repositories\Blog\Interface\GetTranslatedArticlesInterface;
use App\Repositories\Page\Interface\PageRepositoryInterface;

class PageRepository implements PageRepositoryInterface, GetTranslatedArticlesInterface
{
    public function countPages($lang, $publishedOnly = false){
        return Page::locale($lang)->count();
    }

    public function getPages($lang, $paginate, $publishedOnly = false)
    {
        if ($publishedOnly) {
            return Page::locale($lang)->published()->orderBy('created_at', 'DESC')->paginate($paginate);
        }
        return Page::locale($lang)->orderBy('created_at', 'DESC')->paginate($paginate);
    }

    public function getAllTranslatedArticles($uri)
    {
        // dd($uri);
        $originalPage = Page::where('uri', $uri)->firstOrFail();
        $translatedPages = Page::where('original_content_id', $originalPage->original_content_id);
        return $translatedPages;
    }

    public function takePages($lang, $take){
        return Page::locale($lang)->get()->take($take);
    }
    public function getOriginalContentId($uri)
    {
        // dd($uri);
        $page = Page::where('uri', $uri)->firstOrFail();
        return $page->original_content_id;
    }

    public function countTranslatedArticle($originalContentId, $lang)
    {
        return Page::where('original_content_id', $originalContentId)->locale($lang)->count();
    }

    public function getTranslatedArticle($originalContentId, $lang)
    {
        return Page::where('original_content_id', $originalContentId)->locale($lang)->first();
    }
}
