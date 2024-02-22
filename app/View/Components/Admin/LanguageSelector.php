<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Http\Entities\Site;

class LanguageSelector extends Component
{
    public $contentId;
    public $contentTitle;
    public $route;
    public $siteEntity;
    public $locales;
    public $getLocaleName;
    public $getCurrentLocale;
    public $getDefaultLocale;
    public function __construct($siteEntity, $contentId, $contentTitle, $route)
    {
        $this->contentId = $contentId;
        $this->contentTitle = $contentTitle;
        $this->route = $route;
        $this->siteEntity = $siteEntity;
        $this->getLocaleName = $this->getLocaleName();
        $this->getCurrentLocale = $this->getCurrentLocale();
        $this->getDefaultLocale = $this->getDefaultLocale();
        $this->locales = $this->getAllLocalizations();
    }

    public function render(): View|Closure|string
    {
        return view('components.admin.language-selector');
    }

    public function getAllLocalizations(){

        return $this->cutCurrentLocale($this->siteEntity->getAllLocalizations());
    }

    public function getLocaleName(){

        return $this->siteEntity->getCurrentLocaleName();
    }

    public function getCurrentLocale(){

        return $this->siteEntity->getCurrentLocale();
    }

    public function getDefaultLocale(){

        return $this->siteEntity->getDefaultLocale();
    }

    public function getRoute(){

        return $this->route;
    }

    private function cutCurrentLocale($locales){
        return array_filter($locales, function($k) {
            return (($k !== $this->getCurrentLocale) or ($k !== $this->getDefaultLocale));
        }, ARRAY_FILTER_USE_KEY);
    }
}
