<?php

namespace App\Services\Localization;

use App\Http\Entities\Site;

class Localization{

    public function locale() : string {

        $site = new Site();
        return $site->getLocale();
    }
}
