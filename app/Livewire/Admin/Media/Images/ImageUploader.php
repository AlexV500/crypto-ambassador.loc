<?php

namespace App\Livewire\Admin\Media\Images;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageUploader extends Component
{
    use WithFileUploads, WithPagination;

    public $defaultLocale;
    public $currentLocale;
    public $imageRepository;
    public $imagePath;
    public $fullpath;
    public $imageFolder;
    public $postType;

    #[Validate(['images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'])]
    public $images = [];
    public $imagesName = [];



    public function mount($siteEntity, $imageRepository, $imagePath, $imageFolder, $postType)
    {
        $this->defaultLocale = $siteEntity->getDefaultLocale();
        $this->currentLocale = $siteEntity->getCurrentLocale();
        $this->imageRepository = $imageRepository;
        $this->imagePath = public_path($imagePath);
        $this->imageFolder = $imageFolder;
        $this->postType = $postType;
        $this->fullpath = public_path($imagePath.$imageFolder);
    }

    public function checkFolder() : void
    {
        try {
            if (!File::exists($this->fullpath)) {
                File::makeDirectory($this->fullpath, 0755, true, true);
            }
        } catch (\Exception $exception){
            abort(500);
        }
    }

    public function save()
    {
        $this->checkFolder();
        foreach ($this->images as $image) {
            try{
                $data['image'] = $image->hashName();
                $data['folder'] = $this->imageFolder;
                $data['path'] = $this->imagePath;
                $data['post_type'] = $this->postType;
                $data['lang'] = $this->currentLocale;
                //    dd($data);
                $this->imageRepository->recordImage($data);
                $image->store($this->fullpath);
                $this->imagesName[] = $image->hashName();
            }catch (\Exception $e){
                request()->session()->flash('error', 'Oops Something went wrong!');
            }
        }
        $this->refreshImages();
    }

    public function removeImage($index)
    {
        try{
            $this->imageRepository->removeImageRecord($this->imagesName[$index]);
            Storage::delete($this->fullpath .'/'. $this->imagesName[$index]);
            unset($this->images[$index]);
            unset($this->imagesName[$index]);
            $this->refreshImages();
        }catch (\Exception $e){
            request()->session()->flash('error', 'Oops Something went wrong!');
        }
    }

    public function refreshImages()
    {
        return $this->imageRepository->getImages($this->imageFolder)
            ->simplePaginate(8, pageName: 'images-page');
    }

    public function render()
    {
        $images = $this->refreshImages();
        $fullpath = $this->fullpath;

        return view('livewire.admin.media.images.image-uploader',
            compact('images','fullpath'));
    }
}
