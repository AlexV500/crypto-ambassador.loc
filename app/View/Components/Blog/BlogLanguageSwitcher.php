<?php

namespace App\View\Components\Blog;

use App\Http\Entities\Site;
use App\Services\LanguageSwitcherService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogLanguageSwitcher extends Component
{
    public $localization;
    public $siteEntity;
    public $getLocaleName;
    public $locales;

    public function __construct(LanguageSwitcherService $languageSwitcherService, $siteEntity){

        $this->siteEntity = $siteEntity;
        $this->getLocaleName = $this->getLocaleName();
        $this->locales = $languageSwitcherService->getLanguageSwitcherLinks($siteEntity);
    }

    public function render(): View|Closure|string
    {
        return view('components.blog.header.blog-language-switcher');
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
