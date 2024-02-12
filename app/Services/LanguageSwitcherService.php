<?php

namespace App\Services;

class LanguageSwitcherService{

    public function getLanguageSwitcherLinks($siteEntity){

        $routeName = request()->route()->getName();
        if(array_key_exists($routeName, $siteEntity->getRepositoryesByRouteName())){

        }
    }
}
