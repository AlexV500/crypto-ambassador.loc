<?php

namespace App\Http\Controllers\Admin\Page;

use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Services\Admin\Media\ImagesGalleryUploadService;

class DeleteController extends Controller{

    public function __invoke(Page $page, ImagesGalleryUploadService $imagesGalleryUploadService){

        $imagesGalleryUploadService->removePostImages($page->original_content_id, 'media/images/page/');
        $page->delete();
        return redirect()->route('admin.page.index');
    }
}
