<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $query = Personnel::query()
            ->join('users', 'personnels.user_id', '=', 'users.id')
            ->select('personnels.*', 'users.name', 'users.prenom', 'users.email');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('users.name', 'like', "%{$search}%")
                  ->orWhere('users.prenom', 'like', "%{$search}%")
                  ->orWhere('users.email', 'like', "%{$search}%");
            });
        }

        $personnels = $query->orderBy('name', 'asc')->paginate(10);

        return view('personnels.index', compact('personnels', 'search'))->with('succes', 'Listes des personnls');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view("personnels.create_or_update", compact('roles'))->with('succes', 'Lancement de création d\'un personnel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[^0-9]*$/',
            'prenom' => 'required|string|max:255|regex:/^[^0-9]*$/',
            'email' => 'required|string|email|max:255|unique:users',
            'contact' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
            'lieu_de_provenance' => 'required|string|max:255|regex:/^[^0-9]*$/',
            'etat' => 'required|string|in:actif,inactif|regex:/^[^0-9]*$/',
            'role' => 'required|exists:roles,name|regex:/^[^0-9]*$/',
        ]);

        $user = User::updateOrCreate([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),  // hash du mot de passe
        ]);
        // event(new Registered($user));







        $user->personnel()->create([
            'lieu_de_provenance' => $request->lieu_de_provenance,
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
        return view('personnels.show', compact('personnel'))->with('succes', 'Détail sur un personnle effectuée');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personnel $personnel)
    {
        $personnel = Personnel::findOrFail($personnel->id);
        $roles = Role::all();
        return view('personnels.create_or_update', compact('personnel', 'roles'))->with('succes', 'Edition d\' un personnel');
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
            'contact' => 'required|string|min:8',
            'lieu_de_provenance' => 'required|string|max:255|regex:/^[^0-9]*$/',
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
            'lieu_de_provenance' => $request->lieu_de_provenance,
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
        // Vérifier si l'utilisateur est associé à un ménage
        $user = $personnel->user;

        // Vérifier si l'utilisateur est également associé à un ménage
        $hasMenage = $user->menage()->exists();

        if ($hasMenage) {
            // Si l'utilisateur est associé à un ménage, on supprime uniquement le personnel
            $personnel->delete();
        } else {
            // Si l'utilisateur n'a pas de ménage, on supprime l'utilisateur et le personnel
            $personnel->delete();
            $user->delete();
        }

        return redirect()->route('personnels.index')->with('success', 'Personnel supprimé avec succès');
    }




}
