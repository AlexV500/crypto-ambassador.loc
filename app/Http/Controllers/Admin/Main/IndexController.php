<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\SiteController;
use App\Models\User;
use App\Repositories\Blog\Category\Interface\BlogCategoryRepositoryInterface;
use App\Repositories\Blog\Post\Interface\BlogPostRepositoryInterface;
use App\Repositories\Blog\Tag\Interface\BlogTagRepositoryInterface;

class IndexController extends SiteController{

    public function __invoke(BlogCategoryRepositoryInterface $blogCategoryRepository,
                             BlogPostRepositoryInterface $blogPostRepository,
                             BlogTagRepositoryInterface $blogTagRepository){

        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['postsCount'] = $blogPostRepository->countPosts($this->getCurrentLocale());
        $data['categoriesCount'] = $blogCategoryRepository->countCategories($this->getCurrentLocale());
        $data['tagsCount'] = $blogTagRepository->countTags($this->getCurrentLocale());

        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();


//        $array = [$getLocale, $this->siteEntity->getConfigLocale()];
//        dd($array);

        return view('admin.main.index', compact('data', 'locales', 'getLocaleName'));
    }
}
