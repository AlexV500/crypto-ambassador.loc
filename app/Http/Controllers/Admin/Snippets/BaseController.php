<?php

namespace App\Http\Controllers\Admin\Snippets;

use App\Http\Controllers\SiteController;
use App\Models\Snippet;

class BaseController extends SiteController{

    public function __construct(){
        parent::__construct();
    }

    public function getSnippets(){
        return Snippet::where('lang', '=', $this->getCurrentLocale())->get();
    }

    public function getSnippetsWhithDefaultLocale(){
        return Snippet::where('lang', '=', $this->getDefaultLocale())->get();
    }
}
