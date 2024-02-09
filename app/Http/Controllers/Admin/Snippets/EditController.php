<?php

namespace App\Http\Controllers\Admin\Snippets;

use App\Http\Controllers\SiteController;
use App\Models\Snippet;

class EditController extends BaseController{

    public function __invoke(Snippet $snippet){

        $addViewVariables = [
            'snippet' => $snippet,
        ];

        return view('admin.snippets.edit', $this->mergeViewVariables($addViewVariables));
    }
}
