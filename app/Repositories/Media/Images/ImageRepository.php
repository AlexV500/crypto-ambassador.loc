<?php

namespace App\Repositories\Media\Images;

use App\Models\Media\Image;
use App\Repositories\Media\Images\Interface\ImageRepositoryInterface;

class ImageRepository implements ImageRepositoryInterface
{

    public function __construct(){}
    public static function countImages($folder, $lang = '')
    {
        return Image::where('folder', '=', $folder)->count();
    }
    public static function getImages($folder, $paginate, $lang = '')
    {
        return Image::where('folder', '=', $folder)->orderBy('created_at', 'DESC')->paginate($paginate);
    }

    public static function takeImages($folder, $take)
    {
        return Image::where('folder', '=', $folder)->get()->take($take);
    }

    public static function recordImage($data)
    {
        Image::create($data);
    }

    public static function removeImageRecord($imageName){

        Image::where('image', '=', $imageName)->delete();
    }

}
