<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Requests\Admin\Blog\Post\UpdateRequest;
use App\Models\Blog\Post;

class UpdateController extends BaseController{

    public function __invoke(UpdateRequest $request, Post $post){
//        dd($request);
        $data = $request->validated();
        $post = $this->service->update($data, $post);
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();

        return view('admin.blog.post.show', compact(
            'post',
            'getLocaleName',
            'locales'));
    }
}
