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

    public function saveImages($request)
    {
        $fullpath = public_path($request['image_path'].$request['folder']);
        $this->checkFolder($fullpath);

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $data['image']=$imageName;
                $data['folder'] = $request['folder'];
                $data['image_path'] = $request['image_path'];
                $data['post_type'] = $request['post_type'];
                $data['lang'] = $request['lang'];
                $file->move($fullpath, $imageName);
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
