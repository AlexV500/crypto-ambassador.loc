<?php

namespace App\Repositories\Blog\Interface;

interface GetTranslatedArticlesInterface
{
    public function getOriginalContentId(string $uri);

    public function countTranslatedArticle(string $originalContentId, string $lang);

    public function getTranslatedArticle(string $originalContentId, string $lang);
}
