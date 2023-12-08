<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\SiteController;
use App\Http\Requests\Admin\Page\UpdateRequest;
use App\Models\Page;
use App\Models\Snippet;

class UpdateController extends SiteController{

    public function __invoke(UpdateRequest $request, Page $page){

        $data = $request->validated();
        $page->update($data);
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.snippets.show', compact('page', 'locales',  'getLocaleName'));
    }
}
