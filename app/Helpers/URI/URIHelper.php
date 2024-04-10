<?php

namespace App\Helpers\URI;

use Illuminate\Support\Str;

class URIHelper
{
    public static function transliterateUri(){
        $content = request()->json()->all();
        $ready = Str::slug($content['title']);
        return response()->json(['title' => $ready]);
    }
}
