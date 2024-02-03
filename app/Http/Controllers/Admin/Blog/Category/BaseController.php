<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Repositories\Blog\Category\Interface\BlogCategoryRepositoryInterface;

class BaseController extends AdminBlogController{

    protected object $blogCategoryRepository;
    public function __construct(BlogCategoryRepositoryInterface $blogCategoryRepository){

        $this->blogCategoryRepository = $blogCategoryRepository;
        parent::__construct();
    }
    public function getCategories(){
        return $this->blogCategoryRepository->getCategories($this->getCurrentLocale());
    }

    public function getCategoryPosts($category)
    {
        return $this->blogCategoryRepository->getCategoryPosts($category, 5, $publishedOnly = false);
    }

}
