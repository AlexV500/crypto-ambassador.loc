<?php

namespace App\Services;

use App\Repositories\Blog\Interface\GetTranslatedArticlesInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use stdClass;

class LanguageSwitcherService{

    private $siteEntity;
    private $routeName;
    private $segments;
    public function getLanguageSwitcherLinks($siteEntity) : Collection
    {
        $this->siteEntity = $siteEntity;
        $this->routeName = request()->route()->getName();
        $this->segments = $this->prepSegments(request()->segments());
        return $this->createLanguageSwitcherLinks();
    }

    private function prepSegments($segments){
        if($this->siteEntity->checkDefaultLocale()){
            array_unshift($segments, $this->siteEntity->getDefaultLocale());
        } return $segments;
    }

    private function createLanguageSwitcherLinks(): Collection
    {
        $urls = [];
        $locales = $this->siteEntity->getConfigLocales();
        $segments = $this->segments;
        $repoCollection = $this->siteEntity->getRepositoriesByRouteName();
        $repository = $this->initRepositoryClass($repoCollection);

        $originalContentId = $this->getOriginalContentId($repository, $segments);

        if (!$this->checkEmptyOriginalContentId($originalContentId)) {

            $urls = $this->getTrContentURLs($locales, $segments, $repository, $originalContentId);
        } else {
            $urls = $this->getTrURLs($locales, $segments);
        }
      //  $urls = $this->cutDefaultLanguage($urls);
        return collect($urls);
    }


    private function getTrURLs($locales, $segments)
    {
        foreach ($locales as $locale => $nameOfLang) {
            $urls[$nameOfLang] = url($this->cutDefaultLanguage($locale, $this->getURLs($segments, $locale)));
        }
        return collect($urls);
    }

    private function getTrContentURLs($locales, $segments, $repository, $originalContentId)
    {

        foreach ($locales as $locale => $nameOfLang) {

            $count = $repository->countTranslatedArticle($originalContentId, $locale);
            $larr[$nameOfLang] = $count;
            if ($count > 0) {
                $translatedArticle = $repository->getTranslatedArticle($originalContentId, $locale);
                $segments = $this->changeURI($segments, $translatedArticle->uri);
            } else {
                continue;
            }
            $urls[$nameOfLang] = url($this->cutDefaultLanguage($locale, $this->getURLs($segments, $locale)));
        } // dd($larr);
        return collect($urls);
    }


    private function getURLs($segments, $locale) : string{
        array_shift($segments);
        array_unshift($segments, $locale);
        return implode('/', $segments);
    }


    private function initRepositoryClass($repoCollection)
    {
        if ($this->checkRepoCollection($repoCollection)) {
            $repositoryClass = $repoCollection->get($this->routeName);
            return new $repositoryClass();
        }
        return false;
    }

    private function getOriginalContentId($repository, $segments): string
    {
        if ($repository instanceof GetTranslatedArticlesInterface) {
        //    dd($repository->getOriginalContentId($this->getURIfromSegments($segments)));
            return $repository->getOriginalContentId($this->getURIfromSegments($segments));
        }
        return '';
    }

    private function cutDefaultLanguage($locale, $url)
    {
        if ($locale == $this->siteEntity->getDefaultLocale()) {
            $defaultLangUrlExploded = explode('/', $url);
            array_shift($defaultLangUrlExploded);
            $url = implode('/', $defaultLangUrlExploded);
        }
        return $url;
    }

    private function checkRepoCollection($repoCollection) : bool
    {
        return $repoCollection->isNotEmpty() && $repoCollection->has($this->routeName);
    }

    private function checkEmptyRepositoryClass($repository) : bool
    {
        return $repository == false;
    }

    private function checkEmptyOriginalContentId($originalContentId) : bool
    {
        if(strlen($originalContentId) == 0){
            return true;
        }
        return false;
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
