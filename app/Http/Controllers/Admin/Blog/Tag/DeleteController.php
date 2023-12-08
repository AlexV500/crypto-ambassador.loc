<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;

class DeleteController extends Controller{

    public function __invoke(Tag $tag){

        $tag->delete();
        return redirect()->route('admin.blog.tag.index');
    }
}
