<?php

namespace App\Http\Controllers\Admin\Page;

use App\Models\Page;

use App\Services\Admin\Media\ImagesGalleryUploadService;

class EditController extends BaseController{

    public function __invoke(Page $page){

        $addViewVariables = [
            'page' => $page,
            'mainImageShowStatus' => false,
        ];

        return view('admin.page.edit', $this->mergeViewVariables($addViewVariables));
    }
}
