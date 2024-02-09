<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Admin\Blog\AdminBlogController;
use App\Models\Blog\Tag;

class EditController extends AdminBlogController{

    public function __invoke(Tag $tag){

        $addViewVariables = [
            'tag' => $tag,
        ];
        return view('admin.blog.tag.edit', $this->mergeViewVariables($addViewVariables));
    }
}
