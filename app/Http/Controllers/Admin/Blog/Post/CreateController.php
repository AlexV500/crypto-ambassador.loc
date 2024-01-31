<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CreateController extends BaseController{

    public function __invoke(){

        $categories = $this->getCategories();
        $tags = $this->getTags();
        $customDate = Carbon::now();
        $getCurrentLocale = $this->getCurrentLocale();
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        $originalContentId = $this->createTranslationService->getOriginalContentId($this->siteEntity);
        $originalContentTitle = $this->createTranslationService->getOriginalContentTitle($this->siteEntity);

        return view('admin.blog.post.create', compact(
            'originalContentId',
            'originalContentTitle',
            'categories',
            'customDate',
            'tags',
            'getCurrentLocale',
            'getLocaleName',
            'locales'));
    }

    private function getOriginalContent(){}
}
