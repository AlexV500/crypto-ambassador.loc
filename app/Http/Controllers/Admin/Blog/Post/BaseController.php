<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Services\Admin\Blog\PostService;
use App\Services\Admin\TranslateContentCreationService;


class BaseController extends AdminBlogController{

    public $service;
    public $createTranslationService;

    public function __construct(PostService $service, TranslateContentCreationService $createTranslationService){

        parent::__construct();
        $this->service = $service;
        $this->createTranslationService = $createTranslationService;
    }
}
