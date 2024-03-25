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


    public function __construct($siteEntity, $imageFolder){

        $this->defaultLocale = $siteEntity->getDefaultLocale();
        $this->currentLocale = $siteEntity->getCurrentLocale();
        $this->imageFolder = $imageFolder;

    }

    public function render(): View|Closure|string
    {
        $countImages = ImageRepository::countImages($this->imageFolder);
        $images = ImageRepository::getImages($this->imageFolder, 8);
    //    $fullpath = public_path($this->imagePath.$this->imageFolder);

        return view('components.admin.media.images-gallery-uploader',
            compact(
                'countImages',
                'images',
                ));
    }
}
