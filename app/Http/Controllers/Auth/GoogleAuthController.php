<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user(); // Assurez-vous que la méthode 'stateless' est disponible

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt('123456dummy')
                ]
            );

            Auth::login($user);

            return redirect()->intended('dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['message' => 'Erreur lors de la connexion Google. Veuillez réessayer.']);
        }
    }
}
