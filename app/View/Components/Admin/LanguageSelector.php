<?php

namespace App\View\Components\Admin;

use App\Helpers\Localization\TranslRepositoryHelper;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Http\Entities\Site;

class LanguageSelector extends Component
{
    public $originalContentId;
    public $contentTitle;
    public $route;
    public $siteEntity;
    public $locales;
    public $getLocaleName;
    public $getCurrentLocale;
    public $getDefaultLocale;
    public function __construct($siteEntity, $originalContentId, $contentTitle, $route, $publicRoute)
    {
        $this->originalContentId = $originalContentId;
        $this->contentTitle = $contentTitle;
        $this->route = $route;
        $this->publicRoute = $publicRoute;
        $this->siteEntity = $siteEntity;
        $this->getLocaleName = $siteEntity->getLocaleName();
        $this->getCurrentLocale = $siteEntity->getCurrentLocale();
        $this->getDefaultLocale = $siteEntity->getDefaultLocale();
        $this->locales = $this->getAllLocalizations($siteEntity->getAllLocalizations());
    }

    public function render(): View|Closure|string
    {
        return view('components.admin.language-selector');
    }

    public function getAllLocalizations($locales){

        return $this->disableReadyTranslations($this->cutCurrentLocale($locales));
    }

    private function disableReadyTranslations($locales){

        $filtered = [];
        $repository = TranslRepositoryHelper::initTranslationsRepository($this->siteEntity, $this->publicRoute);

        foreach ($locales as $locale => $localeName){
            $count = $repository->countTranslatedArticle($this->originalContentId, $locale);
            if($count == 0){
                $filtered[$locale] = $localeName;
            }
        } return $filtered;
    }

    private function cutCurrentLocale($locales){
        return array_filter($locales, function($k) {
            return (($k !== $this->getCurrentLocale) or ($k !== $this->getDefaultLocale));
        }, ARRAY_FILTER_USE_KEY);
    }
}
