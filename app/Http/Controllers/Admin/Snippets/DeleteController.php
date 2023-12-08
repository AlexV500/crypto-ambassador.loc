<?php

namespace App\Http\Controllers\Admin\Snippets;

use App\Http\Controllers\Controller;
use App\Models\Snippet;

class DeleteController extends Controller{

    public function __invoke(Snippet $snippet){

        $snippet->delete();
        return redirect()->route('admin.snippets.index');
    }
}
