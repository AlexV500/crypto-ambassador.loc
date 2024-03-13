<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\SiteController;

class AdminBlogController extends SiteController{

    protected object $createTranslationService;
    protected object $blogCategoryRepository;
    protected object $blogPostRepository;
    protected object $blogTagRepository;
    protected object $imageRepository;

    public function __construct($createTranslationService, $blogCategoryRepository, $blogPostRepository, $blogTagRepository, $imageRepository){

        parent::__construct();
        $this->createTranslationService = $createTranslationService;
        $this->blogCategoryRepository = $blogCategoryRepository;
        $this->blogPostRepository = $blogPostRepository;
        $this->blogTagRepository = $blogTagRepository;
        $this->imageRepository = $imageRepository;
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
