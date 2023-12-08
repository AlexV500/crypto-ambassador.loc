<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Tag\StoreRequest;
use App\Models\Blog\Tag;

class StoreController extends Controller{

    public function __invoke(StoreRequest $request){

        $data = $request->validated();
        Tag::firstOrCreate($data);
        return redirect()->route('admin.blog.tag.index');
    }
}
