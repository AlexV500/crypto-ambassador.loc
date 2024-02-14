<?php

namespace App\Services;


use Illuminate\Support\Collection;

class LanguageSwitcherService{

    public function getLanguageSwitcherLinks($siteEntity)
    {





    }

    private function getTranslatedArticles($siteEntity, $routeName, $segments) : object
    {
        $translatedArticles = collect([]);
        $repoCollection = $siteEntity->getRepositoriesByRouteName();

        if ($repoCollection->isNotEmpty() && $repoCollection->has($routeName)) {
            $repositoryClass = $repoCollection->get($routeName);
            $repository = new $repositoryClass();
            $translatedArticles = $repository->getTranslatedArticles($this->getURIfromSegments($segments));
        }
        return $translatedArticles;
    }

    private function createLanguageSwitcherLinks($siteEntity, $translatedArticles, $segments)
    {
        $locales = $siteEntity->getConfigLocales();
        $routeName = request()->route()->getName();
        $segments = request()->segments();
        $currentLocale = $siteEntity->getCurrentLocale();

        foreach ($locales as $locale) {

            $translatedArticle = $translatedArticles->filter(function ($translatedArticles) use ($locale) {
                return $translatedArticles->lang === $locale;
            });
            if ($this->getTranslatedArticles($siteEntity, $routeName, $segments)->isNotEmpty()) {
                $segments = $this->changeURI($segments, $translatedArticle->uri);
            }
            if ($locale !== $siteEntity->getDefaultLocale()) {
                array_shift($segments);
            }
            array_unshift($segments, $locale);
            $urls[] = implode('/', $segments);
        }

        //    dd($segments);
        return collect($urls);
    }

    private function getURIfromSegments($segments)
    {
        return array_pop($segments);
    }

    private function changeURI($segments, $uri)
    {
        $this->getURIfromSegments($segments);
        $segments[] = $uri;
        return $segments;
    }

}
