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
    public $oldImages;
    public $countOldImages;
    public $oldImagesName = [];

 //   #[Validate(['images.*' => 'image|max:2048'])]
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

    public function saveImages()
    {
        $this->checkFolder();
        $this->validate([
            'images.*' => 'required|mimes:png,jpg,jpeg,webp|max:2048', // 2MB Max
        ]);
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
                $this->oldImagesName[] = $image->hashName();
            }catch (\Exception $e){
                request()->session()->flash('error', 'Oops Something went wrong!');
            }
        }
        $this->dispatch('imagesUpdated');
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

    #[On('imagesUpdated')]
    public function refreshImages()
    {
        return ImageRepository::getImages($this->imageFolder)
        ->simplePaginate(8, pageName: 'images-page');
    }

    public function render()
    {
        $countOldImages = ImageRepository::countImages($this->imageFolder);
        $oldImages = $this->refreshImages();
        $fullpath = $this->fullpath;

        return view('livewire.admin.media.images.image-uploader',
            compact('oldImages', 'countOldImages', 'fullpath'));
    }
}
