<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Page\StoreRequest;
use App\Models\Page;
use App\Models\Snippet;

class StoreController extends Controller{

    public function __invoke(StoreRequest $request){

        $data = $request->validated();
//        dd($data);
        Page::firstOrCreate($data);
        return redirect()->route('admin.pages.index');
    }
}
