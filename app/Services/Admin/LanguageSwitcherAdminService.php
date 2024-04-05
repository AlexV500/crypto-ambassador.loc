<?php

namespace App\Services\Admin;

use App\Helpers\Localization\UrlLocal;
use Illuminate\Support\Collection;

class LanguageSwitcherAdminService{
    private $siteEntity;
    private $routeName;
    private $segments;
    private $defaultLocale;

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
    }

    private function prepSegments($segments)
    {
        if ($this->siteEntity->checkDefaultLocale()) {
            array_unshift($segments, $this->siteEntity->getDefaultLocale());
        }
        if(count($segments) > 3){
            $segments = array_slice($segments, 0, 3);
        }
        return $segments;
    }

    private function createLanguageSwitcherLinks(): Collection
    {
        $segments = $this->segments;

        $urls = $this->getTrURLs($segments);
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

}
