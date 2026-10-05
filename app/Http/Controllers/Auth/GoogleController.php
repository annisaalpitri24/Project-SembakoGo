<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => null,
                'role' => 'pembeli',
                'status' => 'active',
            ]);
        }

        // Google Login hanya diperbolehkan untuk pembeli
        if ($user->role !== 'pembeli') {
            return redirect('/login')->withErrors([
                'email' => 'Login dengan Google hanya tersedia untuk pembeli.',
            ]);
        }

        Auth::login($user);

        request()->session()->regenerate();

        return redirect('/');
    }
}