<?php

namespace App\Services\Admin\Blog;

use App\Models\Blog\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostService{

    public function store($data){

        try{
            DB::beginTransaction();
            if( isset($data['category_ids'])) {
                $categoryIds = $data['category_ids'];
                unset($data['category_ids']);
            }
            if( isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
//            if( isset($data['preview_image'])) {
//                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
//            }
//            if( isset($data['main_image'])) {
//                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
//            }
            //    dd($data);
            $post = Post::firstOrCreate($data);

            if( isset($categoryIds)) {
                $post->categories()->attach($categoryIds);
            }
            if( isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }

//            $post->addMediaFromRequest('main_image')
//                 ->toMediaCollection();
            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
        return $post;
    }

    public function update($data, $post){

        try {
            DB::beginTransaction();
            if( isset($data['category_ids'])) {
                $categoryIds = $data['category_ids'];
                unset($data['category_ids']);
            }
            if( isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
//            if( isset($data['preview_image'])) {
//                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
//            }
//            if( isset($data['main_image'])) {
//                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
//            }
            // dd($data);
            $post->update($data);
            if( isset($categoryIds)) {
                $post->categories()->sync($categoryIds);
            }
            if( isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }
//            $post->addMediaFromRequest('main_image')
//                ->toMediaCollection('post-images');
//
//            $post->addMediaFromRequest('preview_image')
//                ->toMediaCollection('post-images');
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;
    }

}
