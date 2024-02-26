<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Session;
use App\Http\Entities\Site;
use Illuminate\Support\Str;

class TranslateContentCreationService {

    public function getOriginalContentTitle($siteEntity) : string {

        $originalContentTitle = '';
        if(!$siteEntity->checkDefaultLocale()){
            if (Session::has('originalContentTitle')) {
                $originalContentTitle = Session::get('originalContentTitle');
            }
        } return $originalContentTitle;
    }

    public function getOriginalContentId($siteEntity): int  {

        $originalContentId = Str::uuid();
        if (!$siteEntity->checkDefaultLocale()) {
            if (Session::has('originalContentId')) {
                $originalContentId = Session::get('originalContentId');
            }
        }
        return $originalContentId;
    }

    public function forgetSessionData() : void{

        Session::forget(['originalContentTitle', 'originalContentId']);
    }

    public function getRepositoryFromRoute($route){

    }


}
