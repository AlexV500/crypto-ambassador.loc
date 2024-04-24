<?php

namespace App\View\Components;

use App\Helpers\Menu\MenuHelper;
use App\Services\LanguageSwitcherService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public $isAdmin;
    public $siteEntity;
    public $currentLocale;
    public $currentLocaleName;
    public $locales;
    protected object $languageSwitcherService;
    /**
     * Create a new component instance.
     */
    public function __construct($siteEntity, LanguageSwitcherService $languageSwitcherService)
    {
        $this->siteEntity = $siteEntity;
        $this->isAdmin = $siteEntity->isAdmin();
        $this->currentLocale = $siteEntity->getCurrentLocale();
        $this->currentLocaleName = $siteEntity->getCurrentLocaleName();
        $this->locales = $siteEntity->getAllLocalizations();
        $this->languageSwitcherService = $languageSwitcherService;
    //    dd(MenuHelper::treeMenuItems($this->currentLocale,'mainTop'));

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }

}
