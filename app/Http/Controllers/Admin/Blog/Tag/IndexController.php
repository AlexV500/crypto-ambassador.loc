<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

class IndexController extends BaseController{

    public function __invoke(){

        $addViewVariables = [
            'tags' => $this->getTags(),
            'blogTagRepository' => $this->blogTagRepository,
        ];
        return view('admin.blog.tag.index', $this->mergeViewVariables($addViewVariables));
    }
}
