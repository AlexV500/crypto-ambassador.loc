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
        $dataImages = [];
        $data = $request->validated();
        if(isset($data['images'])){
            $dataImages = $data['images'];
            unset($data['images']);
        }
        $post = $postService->store($data);
        $imagesGalleryUploadService->saveImages($dataImages, $data['original_content_id'],'media/images/blog/', 'blog', $data['lang']);
        return redirect()->route('admin.blog.post.edit', $post->id);
    }
}
