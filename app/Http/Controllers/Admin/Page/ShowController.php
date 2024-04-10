<?php

namespace App\Http\Controllers\Admin\Page;

use App\Models\Page;

class ShowController extends BaseController{

    public function __invoke(Page $page){

        $addViewVariables = [
            'page' => $page,
        ];
        return view('admin.page.show', $this->mergeViewVariables($addViewVariables));
    }
}
