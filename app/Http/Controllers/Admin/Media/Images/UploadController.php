<?php

namespace App\Http\Controllers\Admin\Media\Images;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Media\Image\StoreRequest;
use App\Services\Admin\Media\ImagesGalleryUploadService;
use Illuminate\Support\Facades\Redirect;

class UploadController extends Controller
{
    public function __invoke(StoreRequest $request, ImagesGalleryUploadService $imagesGalleryUploadService){

    //    $data = $request->validated();
        $imagesGalleryUploadService->saveImages($request);
        return Redirect::back();
    }
}
