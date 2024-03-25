<?php

namespace App\Http\Controllers\Admin\Blog\Post;
use App\Repositories\Media\Images\ImageRepository;
use App\Services\Admin\Media\ImagesGalleryUploadService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class CreateController extends BaseController{

    public function __invoke(){

        $originalContentId = $this->createTranslationService->getOriginalContentId($this->getSiteEntity());

        $addViewVariables = [
            'categories' => $this->getCategories(),
            'tags' => $this->getTags(),
            'customDate' => Carbon::now(),
            'originalContentId' => $originalContentId,
            'originalContentTitle' => $this->createTranslationService->getOriginalContentTitle($this->getSiteEntity()),
        ];
        return view('admin.blog.post.create', $this->mergeViewVariables($addViewVariables));
    }

    private function getOriginalContent(){}
}
