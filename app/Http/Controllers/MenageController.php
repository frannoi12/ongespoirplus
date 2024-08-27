<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreMenageRequest;
use App\Http\Requests\UpdateMenageRequest;
use App\Models\Menage;
use App\Models\Politique;
use App\Models\Secteur;
use App\Models\Service;
use App\Models\Tariff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MenageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $secteurs   = Secteur::all();
        $services   = Service::all();
        $search = $request->input('search');

        $query = Menage::query()
            ->join('users', 'menages.user_id', '=', 'users.id')
            ->select('menages.*', 'users.name', 'users.prenom', 'users.email');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('users.name', 'like', "%{$search}%")
                  ->orWhere('users.prenom', 'like', "%{$search}%")
                  ->orWhere('users.email', 'like', "%{$search}%");
            });
        }

        $menages = $query->orderBy('name','asc')->paginate(10);

        return view('menages.index', compact('menages', 'search','secteurs','services'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $secteurs   = Secteur::all();
        $services   = Service::all();
        $users      = User::all();
        $tariffs    = Tariff::all();
        $politiques = Politique::all();

        return view('menages.create_or_update', compact('secteurs', 'services', 'users', 'tariffs', 'politiques'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);

        $request->validate([
            'name'                 => 'required|string|max:255',
            'prenom'               => 'required|string|max:255',
            'email'                => 'required|string|email|max:255|unique:users',
            'contact'              => 'required|string|min:8',
            'password'             => 'required|string|min:8|confirmed',
            'politique_acceptance' => 'required|boolean', // Accepter 1 ou true comme valeurs valides
            'latitude' => 'required|numeric|between:-90,90', // Valider la latitude
            'longitude' => 'required|numeric|between:-180,180', // Valider la longitude
        ]);

        $user = User::create([
            'name'     => $request->name,
            'prenom'   => $request->prenom,
            'email'    => $request->email,
            'contact'  => $request->contact,
            'password' => Hash::make($request->password), // hash du mot de passe
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

        Menage::create([
            'type_menage'      => $type_menage,
            'politique'        => $request->politique_acceptance == 1 ? true : false, // Utiliser 'politique_acceptance'
            'code' => $code,
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

        return redirect()->route('menages.index')->with('success', 'Ménage créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menage $menage)
    {
        $menage = Menage::findOrFail($menage->id);
        $user   = $menage->user;
        return view('menages.show', compact('menage', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menage $menage)
    {
        $secteurs = Secteur::all();
        $services = Service::all();
        $users    = User::all();
        $tariffs  = Tariff::all();
        $politiques = Politique::all();

        return view('menages.create_or_update', compact('menage', 'secteurs', 'services', 'users', 'tariffs', 'politiques'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenageRequest $request, Menage $menage)
    {
        // Validation des données
        $request->validate([
            'name'                 => 'required|string|max:255',
            'prenom'               => 'required|string|max:255',
            'email'                => 'required|string|email|max:255|unique:users,email,' . $menage->user->id,
            'contact'              => 'required|string|min:8',
            'password'             => 'nullable|string|min:8|confirmed',
            'politique_acceptance' => 'required|boolean',
            'latitude'             => 'required|numeric|between:-90,90',
            'longitude'            => 'required|numeric|between:-180,180',
        ]);


        // Trouver l'utilisateur à mettre à jour
        $user = User::findOrFail($menage->user->id);
        $user->update([
            'name'     => $request->name,
            'prenom'   => $request->prenom,
            'email'    => $request->email,
            'contact'  => $request->contact,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password, // Met à jour le mot de passe uniquement s'il est fourni
        ]);

        // Trouver les entités liées
        $secteur = Secteur::findOrFail($request->secteur_id);
        $service = Service::findOrFail($request->service_id);

        // Générer le code pour le ménage
        $lastMenage = Menage::where('secteur_id', $secteur->id)
            ->where('service_id', $service->id)
            ->orderBy('id', 'desc')
            ->first();

        $lastNumber = $lastMenage ? intval($lastMenage->code) : 0;
        if ($service->code_service !== " ") {
            $code        = $service->code_service . '-' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
            $type_menage = $service->type_service;
        } else {
            $code        = $secteur->nomSecteur . '-' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
            $type_menage = $service->type_service;
        }

        // Trouver le ménage à mettre à jour
        $menage = Menage::findOrFail($menage->id);
        $menage->update([
            'type_menage'      => $type_menage,
            'politique'        => $request->politique_acceptance == 1 ? true : false,
            'code'             => $code,
            'date_abonnement'  => now(),
            'date_prise_effet' => now(),
            'secteur_id'       => $request->secteur_id,
            'tariff_id'        => $request->tariff_id,
            'service_id'       => $request->service_id,
            'localisation'     => json_encode([
                'latitude'  => $request->latitude,
                'longitude' => $request->longitude,
            ]),
        ]);

        return redirect()->route('menages.index')->with('success', 'Ménage mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menage $menage)
    {
        // dd($menage->user->personnel);
        $user = $menage->user;

        // dd($user->personnel);
        // Vérifier si l'utilisateur est lié uniquement à un ménage
        if ($user->personnel) {
            // Si l'utilisateur est également un personnel, ne pas supprimer le user
            $menage->delete();
        } else {
            // Sinon, supprimer le user et le ménage
            $user->delete();
            $menage->delete();
        }

        return redirect()->route('menages.index')->with('success', 'Ménage supprimé avec succès');
    }

}
