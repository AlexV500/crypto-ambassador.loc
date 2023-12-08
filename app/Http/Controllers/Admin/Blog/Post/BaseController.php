<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Services\Admin\Blog\PostService;


class BaseController extends AdminBlogController{

    public $service;

    public function __construct(PostService $service){

        parent::__construct();
        $this->service = $service;
    }
}
