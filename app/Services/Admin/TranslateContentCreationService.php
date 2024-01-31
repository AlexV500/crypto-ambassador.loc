<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Session;
use App\Http\Entities\Site;

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

        $originalContentId = 0;
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


}
