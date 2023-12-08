<?php

namespace App\Helpers\Localization;

use App\Http\Entities\Site;

class UrlLocal{

    public static function localize($index, $cname = '') {

        $site = new Site();
        return $site->getLocalizedURL($index, $cname);
    }
}
