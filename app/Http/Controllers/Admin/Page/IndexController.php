<?php

namespace App\Http\Controllers\Admin\Page;


class IndexController extends BaseController{

    public function __invoke(){

        $addViewVariables = [
            'pages' => $this->getPages(),
            'pageRepository' => $this->pageRepository,
        ];
        return view('admin.page.index', $this->mergeViewVariables($addViewVariables));
    }
}
