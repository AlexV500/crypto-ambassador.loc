<?php

namespace App\View\Components\Blog;

use App\Services\LanguageSwitcherService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Http\Entities\Site;

class BlogHeader extends Component
{
    public $localization;
    public $siteEntity;
    public $isAdmin;
    public $getLocaleName;
    public $locales;

    protected object $languageSwitcherService;
    /**
     * Create a new component instance.
     */
    public function __construct(LanguageSwitcherService $languageSwitcherService)
    {
        $this->siteEntity = new Site();
        $this->isAdmin = $this->isAdmin();
        $this->getLocaleName = $this->getLocaleName();
        $this->locales = $this->getAllLocalizations();
        $this->languageSwitcherService = $languageSwitcherService;
        dd($languageSwitcherService->getLanguageSwitcherLinks($this->siteEntity));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog.blog-header');
    }

    public function isAdmin(){
        return Site::isAdmin();
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
