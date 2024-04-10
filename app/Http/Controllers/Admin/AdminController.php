<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Services\Admin\LanguageSwitcherAdminService;
use App\Services\Admin\TranslateContentCreationService;
use Illuminate\Support\Facades\App;

class AdminController extends SiteController
{
    protected object $createTranslationService;
    public function __construct(){

        $this->createTranslationService = App::make(TranslateContentCreationService::class);
        parent::__construct();
    }

}
