<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\SiteController;
use App\Http\Requests\Admin\Blog\Post\StoreRequest;
use App\Services\Admin\Blog\PostService;
use App\Services\Admin\Media\ImagesGalleryUploadService;
use App\Services\Admin\TranslateContentCreationService;


class StoreController extends SiteController{

    public function __invoke(StoreRequest $request,
                             PostService $postService,
                             TranslateContentCreationService $createTranslationService,
                             ImagesGalleryUploadService $imagesGalleryUploadService)
    {

        $data = $request->validated();
        $postService->store($data);
        $imagesGalleryUploadService->saveImages($data, 'blog', 'media/images/blog');
        return redirect()->route('admin.blog.post.index');
    }
}
