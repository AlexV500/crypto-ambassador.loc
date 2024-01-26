<?php

namespace App\Http\Controllers\Admin\Translate;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Translate\TranslateContentRequest;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Facades\Session;

class TranslateContentController extends Controller{

    public function __invoke(TranslateContentRequest $request){

        $data = $request->validated();

        Session::put('locale', $data['locale']);
        Session::put('originalContentId', $data['contentId']);
        Session::put('originalContentTitle', $data['contentTitle']);
        return redirect()->route($data['route']);
    }
}
