<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\SiteController;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UpdateController extends SiteController{

    public function __invoke(UpdateRequest $request, User $user){

        $data = $request->validated();
        $user->update($data);
        return view('admin.user.show', compact('user'));
    }
}
