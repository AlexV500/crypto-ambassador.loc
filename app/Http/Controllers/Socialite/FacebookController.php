<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $googleUser = User::where('oauth_id', $user->id)->first();

            if($googleUser){

                Auth::login($googleUser);

                return redirect('/dashboard');

            }else{
                $user = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->id,
                    'oauth_type' => 'facebook',
                    'password' => encrypt('admin12345')
                ]);

                Auth::login($user);

                return redirect('/dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
