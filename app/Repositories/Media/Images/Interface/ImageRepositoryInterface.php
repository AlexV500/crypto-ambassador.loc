<?php

namespace App\Repositories\Media\Images\Interface;

interface ImageRepositoryInterface
{
    public function countImages(string $folder,string $lang);

    public function getImages(string $folder,string $lang);

    public function takeImages(string $folder, int $take);

    public function recordImage(array $data);

    public function removeImageRecord(string $imageName);

}
