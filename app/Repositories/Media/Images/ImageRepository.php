<?php

namespace App\Repositories\Media\Images;

use App\Models\Media\Image;
use App\Repositories\Media\Images\Interface\ImageRepositoryInterface;

class ImageRepository implements ImageRepositoryInterface
{
    public function countImages($folder, $lang = false)
    {
        return Image::where('folder', '=', $folder)->count();
    }

    public function getImages($folder, $lang = false)
    {
        return Image::where('folder', '=', $folder)->orderBy('created_at', 'DESC');
    }

    public function takeImages($folder, $take)
    {
        return Image::where('folder', '=', $folder)->get()->take($take);
    }

    public function recordImage($data)
    {
        Image::create($data);
    }

    public function removeImageRecord($imageName){

        Image::where('image', '=', $imageName)->delete();
    }

}
