<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenageRequest;
use App\Http\Requests\UpdateMenageRequest;
use App\Models\Menage;
use App\Models\Secteur;
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
        return view("menages.create_or_update",compact('secteurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenageRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),  // hash du mot de passe
        ]);


        return redirect()->route('menages.index')->with('success', 'Personnel ajouté avec succès');
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
        $menage = Menage::findOrFail($menage->id);
        return view('menages.create_or_update', compact('menage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenageRequest $request, Menage $menage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $menage->user_id,
            'contact' => 'required|string|max:15',
        ]);

        $menage->user->update([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
        ]);

        return redirect()->route('menages.index')->with('success', 'Personnel mis à jour avec succès');
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
