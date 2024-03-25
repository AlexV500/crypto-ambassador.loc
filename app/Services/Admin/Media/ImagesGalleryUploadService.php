<?php

namespace App\Services\Admin\Media;

use App\Repositories\Media\Images\ImageRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImagesGalleryUploadService
{
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
        }
    }

    public function removeImage($index)
    {
        try{
            ImageRepository::removeImageRecord($this->oldImagesName[$index]);
            Storage::delete($this->fullpath .'/'. $this->oldImagesName[$index]);
            unset($this->oldImages[$index]);
            unset($this->oldImagesName[$index]);
            $this->refreshImages();
        }catch (\Exception $e){
            request()->session()->flash('error', 'Oops Something went wrong!');
        }
    }

}
