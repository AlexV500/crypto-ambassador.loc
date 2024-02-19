<?php

namespace App\Services;


use Illuminate\Support\Collection;

class LanguageSwitcherService{

    private $siteEntity;
    private $routeName;
    private $segments;
    public function getLanguageSwitcherLinks($siteEntity) : Collection
    {
        $this->siteEntity = $siteEntity;
        $this->routeName = request()->route()->getName();
        $this->segments = $this->prepSegments(request()->segments());

    //    return $this->getTranslatedArticlesFromRepository();
         return $this->createLanguageSwitcherLinks();

    }

    private function prepSegments($segments){
        if($this->siteEntity->checkDefaultLocale()){
            array_unshift($segments, $this->siteEntity->getDefaultLocale());
        } return $segments;
    }

    private function getRepository()
    {
        $translatedArticles = collect([]);
        $repoCollection = $this->siteEntity->getRepositoriesByRouteName();
        if ($repoCollection->isNotEmpty() && $repoCollection->has($this->routeName)) {
            $repositoryClass = $repoCollection->get($this->routeName);
            $repository = new $repositoryClass();
        }
        return $repository;
    }

    private function createLanguageSwitcherLinks(): Collection
    {
        $locales = $this->siteEntity->getConfigLocales();
        $segments = $this->segments;

        $repoCollection = $this->siteEntity->getRepositoriesByRouteName();
        $urls = [];

        if ($this->checkRepoCollection($repoCollection)) {
            $repositoryClass = $repoCollection->get($this->routeName);
            $repository = new $repositoryClass();
            $originalContentId = $repository->getOriginalContentId($this->getURIfromSegments($this->segments));
        //    dd( $originalContentId);
        }
        foreach ($locales as $locale => $nameOfLang) {

//            $translatedArticle = $translatedArticlesFromRepository->filter(function ($translatedArticles) use ($locale) {
//                return $translatedArticles->lang == $locale;
//            });

            if ($this->checkRepoCollection($repoCollection)) {

                $count = $repository->countTranslatedArticle($originalContentId, $locale);
                if($count > 0){
                    $larr[$locale] = $locale.' '.$count;
                    $translatedArticle = $repository->getTranslatedArticle($originalContentId, $locale);
                    echo $translatedArticle->uri.' ';
                    $segments = $this->changeURI($segments, $translatedArticle->uri);

                } else {
                    continue;
                }
            }
            array_shift($segments);
            array_unshift($segments, $locale);

            $urls[$locale] = implode('/', $segments);
        }
        $urls = $this->cutDefaultLanguage($urls);
    //   dd($larr);
        return collect($urls);
    }

    private function cutDefaultLanguage($urls)
    {
        $defaultLocale = $this->siteEntity->getDefaultLocale();
        if (isset($urls[$defaultLocale])) {
            $defaultLangUrlExploded = explode('/', $urls[$defaultLocale]);
            array_shift($defaultLangUrlExploded);
            $urls[$defaultLocale] = implode('/', $defaultLangUrlExploded);
        }
        return $urls;
    }

    private function checkRepoCollection($repoCollection)
    {
        return $repoCollection->isNotEmpty() && $repoCollection->has($this->routeName);
    }

    private function changeURI($segments, $uri): array    {

        array_pop($segments);
        $segments[] = $uri;
        return $segments;
    }

    private function getURIfromSegments($segments)
    {
        $uri = array_pop($segments);
        return $uri;
    }
}
