<?php

namespace App\Livewire\Admin\Media\Images;

use App\Repositories\Media\Images\ImageRepository;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ShowImages extends Component
{
    use WithFileUploads, WithPagination;

    public $defaultLocale;
    public $currentLocale;
    public $imageRepository;
    public $imagePath;
    public $fullpath;
    public $imageFolder;
    public $postType;
    public $oldImages;
    public $countOldImages;
    public $oldImagesName = [];

    #[Validate(['images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'])]
    public $images = [];
    public $imagesName = [];



    public function mount($siteEntity, $imagePath, $imageFolder, $postType)
    {
        $this->defaultLocale = $siteEntity->getDefaultLocale();
        $this->currentLocale = $siteEntity->getCurrentLocale();

        $this->imagePath = public_path($imagePath);
        $this->imageFolder = $imageFolder;
        $this->postType = $postType;
        $this->fullpath = public_path($imagePath.$imageFolder);
        $this->countOldImages = ImageRepository::countImages($imageFolder);
        $this->oldImages = $this->refreshImages();
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

    public function refreshImages()
    {
        return ImageRepository::getImages($this->imageFolder)
        ->simplePaginate(8, pageName: 'images-page');

    }

    public function render()
    {
        $oldImages = $this->oldImages;
        $fullpath = $this->fullpath;
        $countOldImages = $this->countOldImages;

        return view('livewire.admin.media.images.show-images',
            compact('oldImages', 'countOldImages', 'fullpath'));
    }
}
