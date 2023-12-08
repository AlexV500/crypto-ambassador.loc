<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class TwitterController extends Controller
{
    public function twitterRedirect()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function twitterCallback()
    {
        try {

            $user = Socialite::driver('twitter')->user();

            $twitterUser = User::where('oauth_id', $user->id)->first();

            if($twitterUser){

                Auth::login($twitterUser);

                return redirect('/dashboard');

            }else{
                $user = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->id,
                    'oauth_type' => 'twitter',
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
