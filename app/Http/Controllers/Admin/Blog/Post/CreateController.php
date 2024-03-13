<?php

namespace App\Http\Controllers\Admin\Blog\Post;
use Carbon\Carbon;

class CreateController extends BaseController{

    public function __invoke(){

        $addViewVariables = [
            'categories' => $this->getCategories(),
            'tags' => $this->getTags(),
            'customDate' => Carbon::now(),
            'originalContentId' => $this->createTranslationService->getOriginalContentId($this->getSiteEntity()),
            'originalContentTitle' => $this->createTranslationService->getOriginalContentTitle($this->getSiteEntity()),
            'imageRepository' => $this->imageRepository,
            'imagePath' => 'media/images/',
            'postType' => 'blog'
        ];
        return view('admin.blog.post.create', $this->mergeViewVariables($addViewVariables));
    }

    private function getOriginalContent(){}
}
