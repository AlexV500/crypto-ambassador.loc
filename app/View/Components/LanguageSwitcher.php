<?php

namespace App\View\Components;

use App\Http\Entities\Site;
use App\Services\LanguageSwitcherService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LanguageSwitcher extends Component
{
    public $localization;
    public $siteEntity;
    public $getLocaleName;
    public $locales;

    public function __construct(LanguageSwitcherService $languageSwitcherService, $siteEntity){

        $this->getLocaleName = $this->getLocaleName();
        $this->locales = $this->getAllLocalizations();
        $this->siteEntity = $siteEntity;
        $languageSwitcherService->getLanguageSwitcherLinks($this->siteEntity);
    }

    public function render(): View|Closure|string
    {
        return view('components.language-switcher');
    }

    public function getAllLocalizations(){

        return $this->siteEntity->getAllLocalizations();
    }

    public function getLocale(){

        return $this->siteEntity->getLocale();
    }

    public function getLocaleName(){

        return $this->siteEntity->getCurrentLocaleName();
    }

    public function getDefaultLocale(){

        return $this->siteEntity->getDefaultLocale();
    }

    public function getCurrentLocale(){

        return $this->siteEntity->getCurrentLocale();
    }
}
