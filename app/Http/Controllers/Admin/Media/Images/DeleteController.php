<?php

namespace App\Http\Controllers\Admin\Media\Images;

use App\Http\Controllers\Controller;
use App\Models\Media\Image;
use Illuminate\Support\Facades\Redirect;

class DeleteController extends Controller
{
    public function __invoke(Image $image){

        $image->delete();
        return Redirect::back();
    }
}
