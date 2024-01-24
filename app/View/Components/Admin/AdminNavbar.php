<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Http\Entities\Site;
class AdminNavbar extends Component
{

    public $siteEntity;
    public $locales;
    public $getLocaleName;
    public function __construct()
    {
        $this->siteEntity = new Site();
        $this->getLocaleName = $this->getLocaleName();
        $this->locales = $this->getAllLocalizations();
    }
    public function render(): View|Closure|string
    {
        return view('components.admin.navbar');
    }

    public function getAllLocalizations(){

        return $this->siteEntity->getAllLocalizations();
    }

    public function getLocaleName(){

        return $this->siteEntity->getCurrentLocaleName();
    }
}
