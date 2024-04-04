<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Models\Blog\Post;
use App\Http\Controllers\Controller;
use App\Services\Admin\Media\ImagesGalleryUploadService;

class DeleteController extends Controller{

    public function __invoke(Post $post, ImagesGalleryUploadService $imagesGalleryUploadService){

        $imagesGalleryUploadService->removePostImages($post->original_content_id, 'media/images/blog/');
        $post->delete();
        return redirect()->route('admin.blog.post.index');
    }
}
