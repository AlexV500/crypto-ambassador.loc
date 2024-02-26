<?php

namespace App\Helpers\Localization;

use App\Repositories\Blog\Interface\GetTranslatedArticlesInterface;

class TranslRepositoryHelper
{
    public static function initTranslationsRepository($siteEntity, $routeName)
    {
        $repoCollection = $siteEntity->getRepositoriesByRouteName();
        if (($repoCollection->isNotEmpty() && $repoCollection->has($routeName))) {
            $repositoryClass = $repoCollection->get($routeName);
            return new $repositoryClass();
        }
        return false;
    }

    public static function getOriginalContentId($repository, $uri): string
    {
        if ($repository instanceof GetTranslatedArticlesInterface) {
            //    dd($repository->getOriginalContentId($this->getURIfromSegments($segments)));
            return $repository->getOriginalContentId($uri);
        }
        return '';
    }
}
