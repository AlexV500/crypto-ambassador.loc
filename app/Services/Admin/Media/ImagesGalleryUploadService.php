<?php

namespace App\Services\Admin\Media;

use App\Repositories\Media\Images\ImageRepository;
use Illuminate\Support\Facades\File;

class ImagesGalleryUploadService
{
    public string $name;

    public function __construct()
    {
        $this->name = 'ImagesGalleryUploadService';
    }

    private function checkFolder($fullpath) : void
    {
        try {
            if (!File::exists($fullpath)) {
                File::makeDirectory($fullpath, 0755, true, true);
            }
        } catch (\Exception $exception){
            abort(500);
        }
    }

    public function saveImages($request, $originalContentId, $mediaFolderPath, $originalContentType, $lang)
    {
        $fullpath = public_path($mediaFolderPath.$originalContentId);
        $this->checkFolder($fullpath);

        if(count($request) > 0){
            foreach($request as $key => $image){
                $imageName=time().'_'.$image->getClientOriginalName();
                $data['image']=$imageName;
                $data['media_folder_path'] = $mediaFolderPath;
                $data['original_content_id'] = $originalContentId;
                $data['original_content_type'] = $originalContentType;
                $data['lang'] = $lang;
                $image->move($fullpath, $imageName);
                ImageRepository::recordImage($data);
            }
        //    $this->makeCoverImage($originalContentId);
        }
    }

    private function makeCoverImage($originalContentId)
    {
        $countCoverImages = ImageRepository::countCoverImages($originalContentId, $lang = '');
        if ($countCoverImages == 0) {
            $image = ImageRepository::takeImages($originalContentId, 1);
//            dd($image);
            ImageRepository::toggleCoverImage($image->id, $image->cover);
        }
    }

    public function toggleCoverImage($id, $folder, $cover)
    {
        $countCoverImages = ImageRepository::countCoverImages($folder);
        if ($countCoverImages == 0) {
            ImageRepository::toggleCoverImage($id, $cover);
        }
        if ($countCoverImages == 1) {
            $coverImage = ImageRepository::getCoverImage($folder);
            ImageRepository::toggleCoverImage($coverImage->id, $coverImage->cover);
            ImageRepository::toggleCoverImage($id, $cover);
        }
    }

    public function removeImage($id, $path)
    {
        $path = public_path($path);
        //    request()->session()->flash('error', $path);
        try{
            ImageRepository::removeImageRecordById($id);
            if(File::exists($path)) {
                File::delete($path);
            }
        }catch (\Exception $e){
            abort(500);
        }
    }

    public function removePostImages(string $originalContentId, string $mediaFolderPath): void
    {
        $dir = public_path($mediaFolderPath . $originalContentId);
        $files = array_diff(scandir($dir), ['.', '..']);
        try {
            foreach ($files as $file) {
                $filePath = "$dir/$file";
                is_dir($filePath) ? delFolder($filePath) : unlink($filePath);
            }
            rmdir($dir);
        } catch (\Exception $e) {
            abort(500);
        }
        ImageRepository::removePostImages($originalContentId);
    }

}
