<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Repositories\Blog\Post\Interface\BlogPostRepositoryInterface;
use App\Services\Admin\Blog\PostService;
use App\Services\Admin\TranslateContentCreationService;


class BaseController extends AdminBlogController{

    protected object $service;
    protected object $createTranslationService;
    protected object $blogPostRepository;

    public function __construct(PostService $service, TranslateContentCreationService $createTranslationService, BlogPostRepositoryInterface $blogPostRepository){

        parent::__construct();
        $this->service = $service;
        $this->createTranslationService = $createTranslationService;
        $this->blogPostRepository = $blogPostRepository;
    }

    public function getPosts(){
        return $this->blogPostRepository->getPosts($this->getCurrentLocale(), 20);
    }
}
