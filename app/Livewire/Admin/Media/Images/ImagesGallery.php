<?php

namespace App\Livewire\Admin\Media\Images;

use App\Repositories\Media\Images\ImageRepository;
use App\Services\Admin\Media\ImagesGalleryUploadService;
use Illuminate\Support\Facades\App;
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
    public $mainImageShowStatus;
    public $imagesGalleryUploadService;

//    public function boot(ImagesGalleryUploadService $imagesGalleryUploadService)
//    {
//
//    }
    public function mount($siteEntity, string $imageFolder, bool $mainImageShowStatus)
    {
        $this->defaultLocale = $siteEntity->getDefaultLocale();
        $this->currentLocale = $siteEntity->getCurrentLocale();
        $this->imageFolder = $imageFolder;
        $this->mainImageShowStatus = $mainImageShowStatus;
    }

//    public function __construct()
//    {
//        $this->imagesGalleryUploadService = App::make(ImagesGalleryUploadService::class);
//    }


    public function toggleCoverImage($id, $folder, $cover)
    {
        $imagesGalleryUploadService = App::make(ImagesGalleryUploadService::class);
        $imagesGalleryUploadService->toggleCoverImage($id, $folder, $cover);
        $this->dispatch('imagesChanged');
    }
    public function removeImage($id, $path)
    {
        $imagesGalleryUploadService = App::make(ImagesGalleryUploadService::class);
        $imagesGalleryUploadService->removeImage($id, $path);
        $this->dispatch('imagesChanged');
    }

    #[On('imagesChanged')]
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
