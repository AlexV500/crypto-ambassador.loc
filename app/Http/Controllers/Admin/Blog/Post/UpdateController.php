<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\SiteController;
use App\Http\Requests\Admin\Blog\Post\UpdateRequest;
use App\Models\Blog\Post;
use App\Services\Admin\Blog\PostService;

class UpdateController extends SiteController{

    public function __invoke(UpdateRequest $request, Post $post, PostService $postService){
    //    dd($request);
    //    dump($postService);
        $data = $request->validated();
        $post = $postService->update($data, $post);
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();

        return view('admin.blog.post.show', compact(
            'post',
            'getLocaleName',
            'locales'));
    }
}
