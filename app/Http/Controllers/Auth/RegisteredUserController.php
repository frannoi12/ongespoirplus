<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Menage;
use App\Models\Politique;
use App\Models\Secteur;
use App\Models\Service;
use App\Models\Tariff;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $secteurs   = Secteur::all();
        $services   = Service::all();
        // $users      = User::all();
        $tariffs    = Tariff::all();
        $politiques = Politique::all();
        return view('auth.register',compact('secteurs','services','tariffs','politiques'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','regex:/^[^0-9]*$/'],
            'prenom' => 'required|string|max:255|regex:/^[^0-9]*$/',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'contact' => ['required', 'regex:/^(9[0-36-9]|7[0-36-9])\d{6}$/'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'politique_acceptance' => 'required|boolean', // Accepter 1 ou true comme valeurs valides
            'latitude' => 'required|numeric|between:-90,90', // Valider la latitude
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
        ]);

        $secteur = Secteur::findOrFail($request->secteur_id);
        $service = Service::findOrFail($request->service_id);

        $lastMenage = Menage::where('secteur_id', $secteur->id)
            ->where('service_id', $service->id)
            ->orderBy('id', 'desc')
            ->first();

        $lastNumber = $lastMenage ? intval($lastMenage->code) : 0;
        if ($service->code_service !== " ") {
            $code        = $service->code_service . '-' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
            $type_menage = $service->id;
        } else {
            $code        = $secteur->nomSecteur . '-' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
            $type_menage = $service->id;
            // dd($type_menage);
        }

        $menageExist = Menage::where('user_id', $user->id)
            ->where('secteur_id', $request->secteur_id)
            ->where('service_id', $request->service_id)
            ->first();

        if ($menageExist) {
            // Mettre à jour l'enregistrement existant
            $menage = $menageExist->update([
                'type_menage'      => $type_menage,
                'politique'        => $request->politique_acceptance == 1 ? true : false,
                'code'             => $code,
                'date_abonnement'  => now(),
                'date_prise_effet' => now(),
                'tariff_id'        => $request->tariff_id,
                'localisation'     => json_encode([
                    'latitude'  => $request->latitude,
                    'longitude' => $request->longitude,
                ]),
            ]);
        } else {
            // Créer un nouvel enregistrement
            $menage = Menage::create([
                'type_menage'      => $type_menage,
                'politique'        => $request->politique_acceptance == 1 ? true : false,
                'code'             => $code,
                'date_abonnement'  => now(),
                'date_prise_effet' => now(),
                'secteur_id'       => $request->secteur_id,
                'user_id'          => $user->id,
                'tariff_id'        => $request->tariff_id,
                'service_id'       => $request->service_id,
                'localisation'     => json_encode([
                    'latitude'  => $request->latitude,
                    'longitude' => $request->longitude,
                ]),
            ]);
        }


        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
