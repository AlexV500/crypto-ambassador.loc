<?php

namespace App\Repositories\Media\Images;

use App\Models\Media\Image;
use App\Repositories\Media\Images\Interface\ImageRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ImageRepository implements ImageRepositoryInterface
{

    public function __construct(){}
    public static function countImages($folder, $lang = '')
    {
        return Image::where('original_content_id', '=', $folder)->count();
    }

    public static function getImage($id)
    {
        return Image::find($id);
    }
    public static function getImages($folder, $paginate, $lang = '')
    {
        return Image::where('original_content_id', '=', $folder)->orderBy('created_at', 'DESC')->paginate($paginate);
    }

    public static function countCoverImages($folder, $lang = '')
    {
        return Image::where('original_content_id', '=', $folder)->where('cover', '=', 1)->count();
    }

    public static function getCoverImage($folder, $lang = '')
    {
        return Image::where('original_content_id', '=', $folder)->where('cover', '=', 1)->first();
    }
    public static function getImagesNoPag($folder, $lang = '')
    {
        return Image::where('original_content_id', '=', $folder)->orderBy('created_at', 'DESC');
    }

    public static function takeImages($folder, $take)
    {
        return Image::where('original_content_id', '=', $folder)->get()->take($take);
    }

    public static function recordImage($data)
    {
        Image::create($data);
    }

    public static function toggleCoverImage($id, $cover){

        $cover = ($cover == 1) ? '0' : '1';
        $tableName = (new Image)->getTable();
        try {
            DB::beginTransaction();

            // dd($data);
            DB::table($tableName)
                ->where('id', $id)
                ->update(['cover' => $cover]);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public static function removeImageRecordById($id){

        Image::find($id)->delete();
    }
    public static function removeImageRecordByName($imageName){

        Image::where('image', '=', $imageName)->delete();
    }

    public static function removePostImages($folder, $lang = ''){
        return Image::where('original_content_id', '=', $folder)->delete();
    }

}
