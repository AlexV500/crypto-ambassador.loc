<?php

namespace App\Http\Controllers;

use App\Http\Entities\Site;


class SiteController extends Controller{

    private array $viewVariablesArray = [];
    private object $siteEntity;

    public function __construct(){

        $this->siteEntity = new Site();
        $this->addViewVariables('siteEntity', $this->getSiteEntity())
             ->addViewVariables('getLocale', $this->getLocale())
             ->addViewVariables('getLocaleName', $this->getLocaleName())
             ->addViewVariables('locales', $this->getAllLocalizations())
             ->addViewVariables('isAdmin', $this->isAdmin());

    }

    public function isAdmin()
    {
        return Site::isAdmin();
    }

    private function getSiteEntity()
    {
        return $this->siteEntity;
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

    public function addViewVariables($name, $value)
    {
        $this->viewVariablesArray[$name] = $value;
        return $this;
    }

    public function mergeViewVariables(array $addViewVariables): array
    {
        return array_merge($this->getViewVariables(), $addViewVariables);
    }

    public function getViewVariables(): array
    {
        return $this->viewVariablesArray;
    }
}
