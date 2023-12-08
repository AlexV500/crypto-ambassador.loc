<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\SiteController;
use App\Models\Contact;

class IndexController extends SiteController{

    public function __invoke(){

        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }
}
