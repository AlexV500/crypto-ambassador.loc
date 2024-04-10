<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\SiteController;
use App\Http\Requests\Admin\Blog\Post\StoreRequest;
use App\Models\Page;
use App\Services\Admin\Blog\PostService;
use App\Services\Admin\Media\ImagesGalleryUploadService;
use App\Services\Admin\TranslateContentCreationService;


class StoreController extends SiteController{

    public function __invoke(StoreRequest $request,
                             TranslateContentCreationService $createTranslationService,
                             ImagesGalleryUploadService $imagesGalleryUploadService)
    {
        $dataImages = [];
        $data = $request->validated();
        if(isset($data['images'])){
            $dataImages = $data['images'];
            unset($data['images']);
        }
        $page = Page::firstOrCreate($data);
        $imagesGalleryUploadService->saveImages($dataImages, $data['original_content_id'],'media/images/page/', 'page', $data['lang']);
        return redirect()->route('admin.page.edit', $page->id);
    }
}
