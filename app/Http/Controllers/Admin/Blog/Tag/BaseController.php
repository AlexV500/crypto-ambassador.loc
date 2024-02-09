<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Repositories\Blog\Category\Interface\BlogCategoryRepositoryInterface;
use App\Repositories\Blog\Post\Interface\BlogPostRepositoryInterface;
use App\Repositories\Blog\Tag\Interface\BlogTagRepositoryInterface;
use App\Services\Admin\TranslateContentCreationService;

class BaseController extends AdminBlogController{

    protected object $blogTagRepository;

    public function __construct(
        TranslateContentCreationService $createTranslationService,
        BlogCategoryRepositoryInterface $blogCategoryRepository,
        BlogPostRepositoryInterface     $blogPostRepository,
        BlogTagRepositoryInterface      $blogTagRepository
    ){
        parent::__construct($createTranslationService, $blogCategoryRepository, $blogPostRepository, $blogTagRepository);
    }
}
