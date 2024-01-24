<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\SiteController;
use App\Models\Contact;

class ShowController extends SiteController{

    public function __invoke(Contact $contact){

//        $categories = Category::all();
        $getLocaleName = $this->getLocaleName();
        return view('admin.contacts.show', compact('contact', 'getLocaleName'));
    }
}
