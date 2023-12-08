<?php

namespace App\Http\Controllers\Admin\Snippets;

use App\Http\Controllers\SiteController;
use App\Http\Requests\Admin\Snippet\UpdateRequest;
use App\Models\Snippet;

class UpdateController extends SiteController{

    public function __invoke(UpdateRequest $request, Snippet $snippet){

        $data = $request->validated();
        $snippet->update($data);
        $getLocaleName = $this->getLocaleName();
        $locales = $this->getAllLocalizations();
        return view('admin.snippets.show', compact('snippet', 'locales',  'getLocaleName'));
    }
}
