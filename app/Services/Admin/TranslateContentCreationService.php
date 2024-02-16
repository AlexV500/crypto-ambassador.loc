<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Session;
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

    public function getOriginalContentId($siteEntity): string  {

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


}
