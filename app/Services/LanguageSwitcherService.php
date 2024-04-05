<?php

namespace App\Services;

use App\Helpers\Localization\TranslRepositoryHelper;
use App\Helpers\Localization\UrlLocal;
use Illuminate\Support\Collection;

class LanguageSwitcherService
{

    private $siteEntity;
    private $routeName;
    private $segments;
    private $defaultLocale;
    private $repository;


    public function getLanguageSwitcherLinks($siteEntity): Collection
    {
        $this->initialize($siteEntity);
        return $this->createLanguageSwitcherLinks();
    }

    private function initialize($siteEntity)
    {
        $this->siteEntity = $siteEntity;
        $this->routeName = request()->route()->getName();
        $this->segments = $this->prepSegments(request()->segments());
        $this->locales = $siteEntity->getConfigLocales();
        $this->defaultLocale = $this->siteEntity->getDefaultLocale();
        $this->repository = TranslRepositoryHelper::initTranslationsRepository($this->siteEntity, $this->routeName);
    }

    private function prepSegments($segments)
    {
        if ($this->siteEntity->checkDefaultLocale()) {
            array_unshift($segments, $this->siteEntity->getDefaultLocale());
        }
        return $segments;
    }

    private function createLanguageSwitcherLinks(): Collection
    {
        $segments = $this->segments;
        $originalContentId = TranslRepositoryHelper::getOriginalContentId($this->repository,
            UrlLocal::getURIfromSegments($segments));

        if (!$this->checkEmptyOriginalContentId($originalContentId)) {
            $urls = $this->getTrContentURLs($segments, $originalContentId);
        } else {
            $urls = $this->getTrURLs($segments);
        }
        //  $urls = $this->removeDefaultLanguagePrefix($urls);
        return collect($urls);

    }

    private function getTrURLs($segments)
    {
        foreach ($this->locales as $locale => $nameOfLang) {
            $urls[$nameOfLang] = url(UrlLocal::removeDefaultLanguagePrefix($locale, $this->defaultLocale, UrlLocal::getURLs($segments, $locale)));
        }
        return collect($urls);
    }

    private function getTrContentURLs($segments, $originalContentId)
    {
        foreach ($this->locales as $locale => $nameOfLang) {

            $count = $this->repository->countTranslatedArticle($originalContentId, $locale);
            $larr[$nameOfLang] = $count;
            if ($count > 0) {
                $translatedArticle = $this->repository->getTranslatedArticle($originalContentId, $locale);
                $segments = UrlLocal::changeURI($segments, $translatedArticle->uri);
            } else {
                continue;
            }
            $urls[$nameOfLang] = url(UrlLocal::removeDefaultLanguagePrefix($locale, $this->defaultLocale, UrlLocal::getURLs($segments, $locale)));
        }
        return collect($urls);
    }

    private function checkEmptyRepositoryClass($repository): bool
    {
        return $repository == false;
    }

    private function checkEmptyOriginalContentId($originalContentId): bool
    {
        return $originalContentId === '' ? true : false;
    }

}
