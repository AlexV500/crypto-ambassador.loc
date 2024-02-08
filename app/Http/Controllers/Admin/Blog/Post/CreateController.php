<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CreateController extends BaseController{

    public function __invoke(){

        $addViewVariables = [
            'categories' => $this->getCategories(),
            'tags' => $this->getTags(),
            'customDate' => Carbon::now(),
            'originalContentId' => $this->createTranslationService->getOriginalContentId($this->getSiteEntity()),
            'originalContentTitle' => $this->createTranslationService->getOriginalContentTitle($this->getSiteEntity()),
        ];
        return view('admin.blog.post.create', $this->mergeViewVariables($addViewVariables));
    }

    private function getOriginalContent(){}
}
