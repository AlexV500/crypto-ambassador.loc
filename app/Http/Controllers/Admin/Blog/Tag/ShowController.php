<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\SiteController;
use App\Models\Blog\Tag;

class ShowController extends SiteController{

    public function __invoke(Tag $tag){

        $addViewVariables = [
            'tag' => $tag,
        ];
        return view('admin.blog.tag.show', $this->mergeViewVariables($addViewVariables));
    }
}
