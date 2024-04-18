<?php

namespace App\Providers;

use App\Repositories\Blog\Category\BlogCategoryRepository;
use App\Repositories\Blog\Category\Interface\BlogCategoryRepositoryInterface;
use App\Repositories\Blog\Post\BlogPostRepository;
use App\Repositories\Blog\Post\Interface\BlogPostRepositoryInterface;
use App\Repositories\Blog\Tag\BlogTagRepository;
use App\Repositories\Blog\Tag\Interface\BlogTagRepositoryInterface;
use App\Repositories\Media\Images\ImageRepository;
use App\Repositories\Media\Images\Interface\ImageRepositoryInterface;
use App\Repositories\Page\Interface\PageRepositoryInterface;
use App\Repositories\Page\PageRepository;
use Illuminate\Support\ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider{
    public function register()
    {
        $this->app->bind(
            BlogCategoryRepositoryInterface::class,
            BlogCategoryRepository::class
        );
        $this->app->bind(
            BlogPostRepositoryInterface::class,
            BlogPostRepository::class
        );
        $this->app->bind(
            BlogTagRepositoryInterface::class,
            BlogTagRepository::class
        );
        $this->app->bind(
            ImageRepositoryInterface::class,
            ImageRepository::class
        );
        $this->app->bind(
            PageRepositoryInterface::class,
            PageRepository::class
        );
    }
}
