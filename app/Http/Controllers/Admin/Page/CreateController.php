<?php

namespace App\Http\Controllers\Admin\Page;

class CreateController extends BaseController{

    public function __invoke(){

        $originalContentId = $this->createTranslationService->getOriginalContentId($this->getSiteEntity());

        $addViewVariables = [
            'originalContentId' => $originalContentId,
            'originalContentTitle' => $this->createTranslationService->getOriginalContentTitle($this->getSiteEntity()),
            'mainImageShowStatus' => false,
        ];
        return view('admin.page.create', $this->mergeViewVariables($addViewVariables));
    }
}
