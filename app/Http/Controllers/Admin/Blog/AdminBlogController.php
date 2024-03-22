<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\SiteController;
use App\Repositories\Blog\Category\Interface\BlogCategoryRepositoryInterface;
use App\Repositories\Blog\Post\Interface\BlogPostRepositoryInterface;
use App\Repositories\Blog\Tag\Interface\BlogTagRepositoryInterface;
use App\Services\Admin\TranslateContentCreationService;

class AdminBlogController extends SiteController{

    protected object $createTranslationService;
    protected object $blogCategoryRepository;
    protected object $blogPostRepository;
    protected object $blogTagRepository;


    public function __construct(TranslateContentCreationService $createTranslationService,
                                BlogCategoryRepositoryInterface $blogCategoryRepository,
                                BlogPostRepositoryInterface     $blogPostRepository,
                                BlogTagRepositoryInterface      $blogTagRepository,){

        parent::__construct();
        $this->createTranslationService = $createTranslationService;
        $this->blogCategoryRepository = $blogCategoryRepository;
        $this->blogPostRepository = $blogPostRepository;
        $this->blogTagRepository = $blogTagRepository;
    }

    public function getCategories()
    {
        return $this->blogCategoryRepository->getCategories($this->getCurrentLocale());
    }
    public function getCategoryPosts($category)
    {
        return $this->blogCategoryRepository->getCategoryPosts($category, 5, $publishedOnly = false);
    }
    public function getPosts(){
        return $this->blogPostRepository->getPosts($this->getCurrentLocale(), 20);
    }
    public function getTags(){
        return $this->blogTagRepository->getTags($this->getCurrentLocale());
    }
    public function getTagPosts($tag)
    {
        return $this->blogTagRepository->tagPosts($tag, 5);
    }

}
