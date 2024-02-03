<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Requests\Admin\Blog\Post\StoreRequest;


class StoreController extends BaseController{

    public function __invoke(StoreRequest $request){

        $data = $request->validated();
        $this->service->store($data);
        $this->createTranslationService->forgetSessionData();

        return redirect()->route('admin.blog.post.index');
    }
}
