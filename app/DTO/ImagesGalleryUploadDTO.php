<?php

namespace App\DTO;

class ImagesGalleryUploadDTO
{
    public readonly string $defaultLocale;
    public readonly string $currentLocale;
    public readonly string $fullpath;
    public function __construct(
        public readonly object $siteEntity,
        public readonly object $imageRepository,
        public readonly string $imagePath,
        public readonly string $imageFolder,
        public readonly string $postType)
    {
        $this->defaultLocale = $siteEntity->getDefaultLocale();
        $this->currentLocale = $siteEntity->getCurrentLocale();
        $this->fullpath = public_path($imagePath.$imageFolder);
    }
}
