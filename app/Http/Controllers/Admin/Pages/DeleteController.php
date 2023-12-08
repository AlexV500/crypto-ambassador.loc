<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;

class DeleteController extends Controller{

    public function __invoke(Page $page){

        $page->delete();
        return redirect()->route('admin.pages.index');
    }
}
