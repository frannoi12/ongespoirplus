<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = User::whereHas('personnel');

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('prenom', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        $users = $query->paginate(10);

        return view('personnels.index', compact('users','search'))->with('succes','Listes des personnls');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view("personnels.create_or_update",compact('roles'))->with('succes','Lancement de création d\'un personnel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'etat' => 'required|string|in:actif,inactif',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),  // hash du mot de passe
        ]);

        $user->personnel()->create([
            'etat' => $request->etat,
            'role' => $request->role,
        ]);

        return redirect()->route('personnels.index')->with('success', 'Personnel ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personnel $personnel)
    {
        $personnel = Personnel::findOrFail($personnel->id);
        return view('personnels.show',compact('personnel'))->with('succes','Détail sur un personnle effectuée');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personnel $personnel)
    {
        $personnel = Personnel::findOrFail($personnel->id);
        $roles = Role::all();
        return view('personnels.create_or_update', compact('personnel','roles'))->with('succes','Edition d\' un personnel');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personnel $personnel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $personnel->user_id,
            'contact' => 'required|string|max:15',
            'etat' => 'required|string|in:actif,inactif',
            'role' => 'required|string|max:255',
        ]);

        $personnel->user->update([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
        ]);

        $personnel->update([
            'etat' => $request->etat,
            'role' => $request->role,
        ]);

        return redirect()->route('personnels.index')->with('success', 'Personnel mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personnel $personnel)
    {
        // dd($personnel->user);

        if($personnel->user){
            $personnel->user->delete();
        }

        $personnel->delete();

        return redirect()->route('personnels.index')->with('success', 'Personnel supprimé avec succès');
    }
}
