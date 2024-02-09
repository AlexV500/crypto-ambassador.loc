<?php

namespace App\Http\Controllers\Admin\Snippets;

use App\Http\Controllers\SiteController;
use App\Models\Snippet;

class CreateController extends BaseController{

    public function __invoke(){

        $addViewVariables = [
            'snippets' => $this->getSnippetsWhithDefaultLocale()
        ];

        return view('admin.snippets.create', $this->mergeViewVariables($addViewVariables));
    }
}
