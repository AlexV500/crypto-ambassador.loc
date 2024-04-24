<?php

namespace App\Helpers\URI;

use Illuminate\Support\Str;

class URIHelper
{
    public static function transliterateUri()
    {
        $content = request()->json()->all();
        $ready = Str::slug($content['title']);
        return response()->json(['title' => $ready]);
    }

    public static function getCurrentResourceUrlPath($siteEntity)
    {
        if ($siteEntity->checkDefaultLocale()) {
            return request()->segment(1) . '/' . request()->segment(2);
        } else return request()->segment(2) . '/' . request()->segment(3);
    }

}
