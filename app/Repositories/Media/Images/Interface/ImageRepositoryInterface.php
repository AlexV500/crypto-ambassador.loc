<?php

namespace App\Repositories\Media\Images\Interface;

interface ImageRepositoryInterface
{
    public static function countImages(string $folder, string $lang);

    public static function getImage(int $id);

    public static function getImages(string $folder,string $lang);

    public static function takeImages(string $folder, int $take);

    public static function recordImage(array $data);

    public static function removeImageRecordByName(string $imageName);

}
