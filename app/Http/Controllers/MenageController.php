<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenageRequest;
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
        $search = $request->input('search');
        $query = User::whereHas('menage');

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('prenom', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        $users = $query->paginate(10);

        return view('menages.index', compact('users','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $secteurs = Secteur::all();
        $services = Service::all();
        $users = User::all();
        $tariffs = Tariff::all();
        $politiques = Politique::all();

        return view('menages.create_or_update', compact('secteurs', 'services', 'users', 'tariffs','politiques'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'politique' => 'required|boolean',
            'secteur_id' => 'required|exists:secteurs,id',
            'user_id' => 'required|exists:users,id',
            'tariff_id' => 'required|exists:tariffs,id',
            'service_id' => 'required|exists:services,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),  // hash du mot de passe
        ]);

        $secteur = Secteur::findOrFail($request->secteur_id);
        $service = Service::findOrFail($request->service_id);

        $lastMenage = Menage::where('secteur_id', $secteur->id)
            ->where('service_id', $service->id)
            ->orderBy('id', 'desc')
            ->first();

        $lastNumber = $lastMenage ? intval($lastMenage->code) : 0;
        if ($service->code_service) {
            $code = $service->code_service . '-' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
            $type_menage = $service->type_service;
        } else {
            $code = $secteur->nomSecteur . '-' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
            $type_menage = $service->type_service;
            dd($type_menage);
        }

        Menage::create([
            'type_menage' => $type_menage,
            'politique' => $request->politique,
            'code' => $code,
            'date_abonnement' => now(),
            'date_prise_effet' => now(),
            'secteur_id' => $request->secteur_id,
            'user_id' => $user->id,
            'tariff_id' => $request->tariff_id,
            'service_id' => $request->service_id,
        ]);

        return redirect()->route('menages.index')->with('success', 'Ménage créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menage $menage)
    {
        $menage = Menage::findOrFail($menage->id);
        return view('menages.show',compact('menage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menage $menage)
    {
        $secteurs = Secteur::all();
        $services = Service::all();
        $users = User::all();
        $tariffs = Tariff::all();

        return view('menages.create_or_update', compact('menage', 'secteurs', 'services', 'users', 'tariffs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenageRequest $request, Menage $menage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'politique' => 'required|boolean',
            'secteur_id' => 'required|exists:secteurs,id',
            'user_id' => 'required|exists:users,id',
            'tariff_id' => 'required|exists:tariffs,id',
            'service_id' => 'required|exists:services,id',
        ]);

        $menage->user->update([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
        ]);

        $secteur = Secteur::findOrFail($request->secteur_id);
        $service = Service::findOrFail($request->service_id);

        if ($menage->secteur_id != $request->secteur_id || $menage->service_id != $request->service_id) {
            $lastMenage = Menage::where('secteur_id', $request->secteur_id)
                ->where('service_id', $request->service_id)
                ->orderBy('id', 'desc')
                ->first();

            $lastNumber = $lastMenage ? intval($lastMenage->code) : 0;
            if ($service->code_service) {
                $code = $service->code_service . '-' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
                $type_menage = $service->type_service;
            } else {
                $code = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
                $type_menage = $service->type_service;
            }
        } else {
            $code = $menage->code;
        }

        $menage->update([
            'type_menage' => $type_menage,
            'politique' => $request->politique,
            'code' => $code,
            'secteur_id' => $request->secteur_id,
            'user_id' => $menage->user_id,
            'tariff_id' => $request->tariff_id,
            'service_id' => $request->service_id,
        ]);

        return redirect()->route('menages.index')->with('success', 'Ménage mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menage $menage)
    {
        if($menage->user){
            $menage->user->delete();
        }

        $menage->delete();

        return redirect()->route('menages.index')->with('success', 'Menage supprimé avec succès');
    }
}
