<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Admin\Blog\Post\BaseController;

class CreateController extends BaseController{

    public function __invoke(){

        $addViewVariables = [
            'originalContentId' => $this->createTranslationService->getOriginalContentId($this->getSiteEntity()),
            'originalContentTitle' => $this->createTranslationService->getOriginalContentTitle($this->getSiteEntity()),
        ];

        return view('admin.blog.category.create', $this->mergeViewVariables($addViewVariables));
    }
}
