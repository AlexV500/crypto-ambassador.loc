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
        $this->segments = request()->segments();
    //    return $this->getTranslatedArticlesFromRepository();
         return $this->createLanguageSwitcherLinks();
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

        if ($this->checkRepoCollection($repoCollection)) {
            $repositoryClass = $repoCollection->get($this->routeName);
            $repository = new $repositoryClass();
        }

        $translatedArticlesFromRepository = $repository->getTranslatedArticles($this->getURIfromSegments($this->segments));

        foreach ($locales as $locale => $nameOfLang) {

//            $translatedArticle = $translatedArticlesFromRepository->filter(function ($translatedArticles) use ($locale) {
//                return $translatedArticles->lang == $locale;
//            });
            if ($this->checkRepoCollection($repoCollection)) {
                $translatedArticle = $repository->getTranslatedArticle($translatedArticlesFromRepository, $locale);

                //   $translatedArticle = $translatedArticle->get();


                $segments = $this->changeURI($segments, $translatedArticle->uri);

            }
            if ($locale !== $this->siteEntity->getDefaultLocale()) {
                array_shift($segments);
            }

            array_unshift($segments, $locale);
            $urls[] = implode('/', $segments);
        }

            dd($segments);
        return collect($urls);
    }

    private function checkRepoCollection($repoCollection){
        return $repoCollection->isNotEmpty() && $repoCollection->has($this->routeName);
    }

    private function changeURI($segments, $uri) : array
    {
        $this->getURIfromSegments($segments);
        $segments[] = $uri;
        return $segments;
    }

    private function getURIfromSegments($segments)
    {
        return array_pop($segments);
    }
}
