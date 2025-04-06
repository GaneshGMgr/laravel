<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
        ->stateless()
        ->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        // dd()
        try {

            $google_user = Socialite::driver('google')
            ->stateless()
            ->user();

            $user = User::where('email', $google_user->email)->first();
            if ($user) {
                Auth::login($user);
                // dd(Auth::user(), "ex");
                return redirect()->route('frontend.index');
            }
            else{
                $new_user = User::create([
                    'name' => $google_user->name,
                    'email' => $google_user->email,
                    'google_id' => $google_user->id,
                ]);

                Auth::login($new_user);
                // dd(Auth::user(), "nw");

                return redirect()->route('frontend.index');
            }
        }
         catch (\Exception $e)
        {
            dd($e->getMessage());
            return redirect()->route('frontend.signin')->with('error', 'Google authentication failed');
        }
    }
}
