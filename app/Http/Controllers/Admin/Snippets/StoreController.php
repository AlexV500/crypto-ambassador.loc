<?php

namespace App\Http\Controllers\Admin\Snippets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Snippet\StoreRequest;
use App\Models\Snippet;

class StoreController extends Controller{

    public function __invoke(StoreRequest $request){

        $data = $request->validated();
//        dd($data);
        Snippet::firstOrCreate($data);
        return redirect()->route('admin.snippets.index');
    }
}
