<?php

namespace App\Http\Controllers\Admin\Blog\Post;
use Carbon\Carbon;

class CreateController extends BaseController{

    public function __invoke(){

        $originalContentId = $this->createTranslationService->getOriginalContentId($this->getSiteEntity());

        $addViewVariables = [
            'categories' => $this->getCategories(),
            'tags' => $this->getTags(),
            'customDate' => Carbon::now(),
            'originalContentId' => $originalContentId,
            'originalContentTitle' => $this->createTranslationService->getOriginalContentTitle($this->getSiteEntity()),
            'mainImageShowStatus' => true,
        ];
        return view('admin.blog.post.create', $this->mergeViewVariables($addViewVariables));
    }
}
