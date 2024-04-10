<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\SiteController;
use App\Http\Requests\Admin\Blog\Post\UpdateRequest;
use App\Models\Page;
use App\Services\Admin\Blog\PostService;
use App\Services\Admin\Media\ImagesGalleryUploadService;

class UpdateController extends SiteController{

    public function __invoke(UpdateRequest $request,
                             Page $page,
                             ImagesGalleryUploadService $imagesGalleryUploadService){
    //    dd($request);
    //    dump($postService);
        $dataImages = [];
        $data = $request->validated();
        if(isset($data['images'])){
            $dataImages = $data['images'];
            unset($data['images']);
        }
        $page->update($data);

        $imagesGalleryUploadService->saveImages($dataImages, $data['original_content_id'],'media/images/page/', 'page', $data['lang']);

        $addViewVariables = [
            'page' => $page
        ];

        return view('admin.page.show', $this->mergeViewVariables($addViewVariables));
    }
}
