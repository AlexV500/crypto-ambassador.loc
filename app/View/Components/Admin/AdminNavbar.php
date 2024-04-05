<?php

namespace App\View\Components\Admin;

use App\Services\Admin\LanguageSwitcherAdminService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;
use App\Http\Entities\Site;
class AdminNavbar extends Component
{

    public $siteEntity;
    public $locales;
    public $getLocaleName;
    public $languageSwitcherAdminService;
    public function __construct()
    {
        $this->languageSwitcherAdminService = App::make(LanguageSwitcherAdminService::class);
        $this->siteEntity = new Site();
        $this->getLocaleName = $this->getLocaleName();
        $this->locales = $this->getAllLocalizations();
    }
    public function render(): View|Closure|string
    {
        return view('components.admin.navbar');
    }

    public function getAllLocalizations(){

     //   return $this->siteEntity->getAllLocalizations();
        return $this->languageSwitcherAdminService->getLanguageSwitcherLinks($this->siteEntity);
    }

    public function getLocaleName(){

        return $this->siteEntity->getCurrentLocaleName();
    }
}
