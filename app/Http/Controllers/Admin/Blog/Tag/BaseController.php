<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Repositories\Blog\Tag\Interface\BlogTagRepositoryInterface;

class BaseController extends AdminBlogController{

    protected object $blogTagRepository;

    public function __construct(BlogTagRepositoryInterface $blogTagRepository){

        $this->blogTagRepository = $blogTagRepository;
        parent::__construct();
    }

    public function getTags(){
        return $this->blogTagRepository->getTags($this->getCurrentLocale());
    }

    public function getTagPosts($tag)
    {
        return $this->blogTagRepository->tagPosts($tag, 5);
    }
}
