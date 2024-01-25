<?php

namespace App\Http\Controllers;

use App\Http\Entities\Site;


class SiteController extends Controller{

    public $localization;
    public $siteEntity;

    public function __construct(){

        $this->siteEntity = new Site();
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
