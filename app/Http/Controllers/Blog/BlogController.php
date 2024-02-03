<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\SiteController;
use App\Repositories\Blog\Category\Interface\BlogCategoryRepositoryInterface;
use App\Repositories\Blog\Post\Interface\BlogPostRepositoryInterface;
use App\Repositories\Blog\Tag\Interface\BlogTagRepositoryInterface;
use Carbon\Carbon;

class BlogController extends SiteController
{

    protected object $blogCategoryRepository;
    protected object $blogPostRepository;
    protected object $blogTagRepository;

    public function __construct(BlogCategoryRepositoryInterface $blogCategoryRepository,
                                BlogPostRepositoryInterface $blogPostRepository,
                                BlogTagRepositoryInterface $blogTagRepository){

        $this->blogCategoryRepository = $blogCategoryRepository;
        $this->blogPostRepository = $blogPostRepository;
        $this->blogTagRepository = $blogTagRepository;
        parent::__construct();
    }
    public function getCarbon(){
        return new Carbon;
    }
    public function getCategories(){
        return $this->blogCategoryRepository->getCategories($this->getCurrentLocale());
    }
    public function getPosts(){
        return $this->blogPostRepository->getPosts($this->getCurrentLocale(), 12, true);
    }
    public function getTagPosts($tag)
    {
        return $this->blogTagRepository->tagPosts($tag, 5, true);
    }
    public function getCategoryPosts($category)
    {
        return $this->blogCategoryRepository->getCategoryPosts($category, 5, true);
    }
    public function getLikedPosts()
    {
        return $this->blogPostRepository->getLikedPosts($this->getCurrentLocale(), 4, true);
    }
    public function getRelatedPosts($post){
        return $this->blogPostRepository->getRelatedPosts($post, $this->getCurrentLocale(), 3, true);
    }
    public function getTags(){
        return $this->blogTagRepository->getTags($this->getCurrentLocale());
    }
}
