<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Repositories\Blog\Category\Interface\BlogCategoryRepositoryInterface;
use App\Repositories\Blog\Post\Interface\BlogPostRepositoryInterface;
use App\Repositories\Blog\Tag\Interface\BlogTagRepositoryInterface;
use App\Services\Admin\Blog\PostService;
use App\Services\Admin\TranslateContentCreationService;

class BaseController extends AdminBlogController
{
    protected object $service;
    public function __construct(PostService $service,
                                TranslateContentCreationService $createTranslationService,
                                BlogCategoryRepositoryInterface $blogCategoryRepository,
                                BlogPostRepositoryInterface     $blogPostRepository,
                                BlogTagRepositoryInterface      $blogTagRepository
    )
    {
        $this->service = $service;
        parent::__construct($createTranslationService, $blogCategoryRepository, $blogPostRepository, $blogTagRepository);
    }
}
