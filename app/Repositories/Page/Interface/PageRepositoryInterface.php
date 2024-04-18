<?php

namespace App\Repositories\Page\Interface;

interface PageRepositoryInterface
{
    public function countPages($lang, $publishedOnly = false);

    public function getPages(string $lang, int $paginate, bool $publishedOnly = false);

    public function takePages(string $lang, int $take);

    public function getAllTranslatedArticles(string $uri);

    public function getOriginalContentId(string $uri);

    public function countTranslatedArticle(string $originalContentId, string $lang);

    public function getTranslatedArticle(string $originalContentId, string $lang);
}
