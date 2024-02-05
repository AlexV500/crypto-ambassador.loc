<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\SiteController;
use App\Repositories\Blog\Post\Interface\BlogPostRepositoryInterface;

class IndexController extends SiteController{

    public function __invoke(BlogPostRepositoryInterface $blogPostRepository){

        $addViewVariables = [
            'posts' => $blogPostRepository->takePosts($this->getCurrentLocale(), 8),
        ];

        return view('main.index', $this->mergeViewVariables($addViewVariables));
    }
}
