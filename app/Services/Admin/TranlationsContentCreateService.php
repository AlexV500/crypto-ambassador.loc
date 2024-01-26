<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Session;

class TranlationsContentCreateService {

    public function getOriginalContent($model){

        if(Session::has('originalContentId')){
            $originalContentId = Session::get('originalContentId');
            $originalContent = $model::where('id', '=',  $originalContentId)->first();
        }
    }

}
