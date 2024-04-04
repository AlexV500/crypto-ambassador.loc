<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\SiteController;
use App\Http\Requests\Admin\Blog\Post\UpdateRequest;
use App\Models\Blog\Post;
use App\Services\Admin\Blog\PostService;
use App\Services\Admin\Media\ImagesGalleryUploadService;

class UpdateController extends SiteController{

    public function __invoke(UpdateRequest $request,
                             Post $post,
                             PostService $postService,
                             ImagesGalleryUploadService $imagesGalleryUploadService){
    //    dd($request);
    //    dump($postService);
        $dataImages = [];
        $data = $request->validated();
        if(isset($data['images'])){
            $dataImages = $data['images'];
            unset($data['images']);
        }
        $post = $postService->update($data, $post);

        $imagesGalleryUploadService->saveImages($dataImages, $data['original_content_id'],'media/images/blog/', 'blog', $data['lang']);
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();

        return view('admin.blog.post.show', compact(
            'post',
            'getLocaleName',
            'locales'));
    }
}
