<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\SiteController;
use App\Models\Contact;

class EditController extends SiteController{

    public function __invoke(Contact $contact){

        return view('admin.contacts.edit', compact('contact'));
    }
}
