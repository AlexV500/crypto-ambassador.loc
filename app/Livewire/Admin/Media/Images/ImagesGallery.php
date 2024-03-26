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

class ImagesGallery extends Component
{
    use WithPagination;

    public $defaultLocale;
    public $currentLocale;
    public $imageFolder;

    public function mount($siteEntity, $imageFolder)
    {
        $this->defaultLocale = $siteEntity->getDefaultLocale();
        $this->currentLocale = $siteEntity->getCurrentLocale();
        $this->imageFolder = $imageFolder;
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
            request()->session()->flash('error', 'Oops Something went wrong!');
        }
        $this->dispatch('imageRemoved');
    }

    #[On('imageRemoved')]
    public function refreshImages()
    {
        return ImageRepository::getImagesNoPag($this->imageFolder)
        ->simplePaginate(4, pageName: 'images-page');
    }

    public function render()
    { //  dd(ImageRepository::getImagesNoPag($this->imageFolder));
     //   $countImages = ImageRepository::countImages($this->imageFolder);
        $images = $this->refreshImages();

        return view('livewire.admin.media.images.images-gallery',
            compact('images'));
    }
}
