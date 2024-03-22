<?php

namespace App\View\Components\Admin\Media;

use App\Repositories\Media\Images\ImageRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
class ImagesGalleryUploader extends Component
{
    public $defaultLocale;
    public $currentLocale;
    public $imagePath;
    public $fullpath;
    public $imageFolder;
    public $postType;
    public $redirectImgGallContrRoute;
    public function __construct($siteEntity, $imagePath, $imageFolder, $postType){

        $this->defaultLocale = $siteEntity->getDefaultLocale();
        $this->currentLocale = $siteEntity->getCurrentLocale();
        $this->imagePath = public_path($imagePath);
        $this->imageFolder = $imageFolder;
        $this->postType = $postType;
        $this->fullpath = public_path($imagePath.$imageFolder);
    }

    public function render(): View|Closure|string
    {
        $countImages = ImageRepository::countImages($this->imageFolder);
        $images = ImageRepository::getImages($this->imageFolder, 8);
        $fullpath = $this->fullpath;
        $currentLocale = $this->currentLocale;

        return view('components.admin.media.images-gallery-uploader',
            compact('images',
                'countImages',
                'fullpath',
                'currentLocale'));
    }
}
