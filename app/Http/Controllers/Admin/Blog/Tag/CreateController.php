<?php

namespace App\Http\Controllers\Admin\Blog\Tag;


class CreateController extends BaseController{

    public function __invoke(){

        $addViewVariables = [
            'originalContentId' => $this->createTranslationService->getOriginalContentId($this->getSiteEntity()),
            'originalContentTitle' => $this->createTranslationService->getOriginalContentTitle($this->getSiteEntity()),
        ];

        return view('admin.blog.tag.create', $this->mergeViewVariables($addViewVariables));
    }
}
