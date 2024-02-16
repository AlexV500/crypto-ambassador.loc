<?php

namespace App\View\Components;

use App\Services\LanguageSwitcherService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public $isAdmin;
    public $getLocale;
    public $getLocaleName;
    public $locales;
    protected object $languageSwitcherService;
    /**
     * Create a new component instance.
     */
    public function __construct($siteEntity, LanguageSwitcherService $languageSwitcherService)
    {
        $this->isAdmin = $siteEntity->isAdmin();
        $this->getLocale = $siteEntity->getLocale();
        $this->getLocaleName = $siteEntity->getCurrentLocaleName();
        $this->locales = $siteEntity->getAllLocalizations();
        $this->languageSwitcherService = $languageSwitcherService;
    //    dd($languageSwitcherService->getLanguageSwitcherLinks($siteEntity));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }

}
