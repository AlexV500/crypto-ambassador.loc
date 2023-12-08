<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\SiteController;
use App\Models\Page;

class BaseController extends SiteController{

    public function __construct(){
        parent::__construct();
    }

    public function getPages(){
        return Page::where('lang', '=', $this->getCurrentLocale())->get();
    }

    public function getPagesWhithDefaultLocale(){
        return Page::where('lang', '=', $this->getDefaultLocale())->get();
    }

}
