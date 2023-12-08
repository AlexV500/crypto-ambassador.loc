<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class DeleteController extends Controller{

    public function __invoke(Contact $category){

        $category->delete();
        return redirect()->route('admin.contacts.index');
    }
}
