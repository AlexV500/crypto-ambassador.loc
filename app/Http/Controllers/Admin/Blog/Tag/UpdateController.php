<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\SiteController;
use App\Http\Requests\Admin\Blog\Tag\UpdateRequest;
use App\Models\Blog\Tag;

class UpdateController extends SiteController{

    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        $addViewVariables = [
            'tag' => $tag,
        ];
        return view('admin.blog.tag.show', $this->mergeViewVariables($addViewVariables));
    }
}
