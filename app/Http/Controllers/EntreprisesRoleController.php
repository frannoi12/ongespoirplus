<?php

namespace App\Http\Controllers;

use App\Models\EntrepriseRole;
use Illuminate\Http\Request;

class EntreprisesRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = EntrepriseRole::all(); // Récupère tous les rôles
        return view('entreprisesRoles.index', compact('roles')); // Retourne une vue avec les données
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entreprises_roles.create'); // Retourne une vue pour créer un nouveau rôle
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|regex:/^[^0-9]*$/',
        ]);

        // Créer un nouveau rôle
        EntrepriseRole::create($validated);

        // Rediriger vers la liste des rôles avec un message de succès
        return redirect()->route('entreprises_roles.index')->with('success', 'Rôle créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = EntrepriseRole::findOrFail($id); // Trouve le rôle par son ID ou échoue
        return view('entreprises_roles.show', compact('role')); // Retourne une vue avec les détails du rôle
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = EntrepriseRole::findOrFail($id); // Trouve le rôle par son ID
        return view('entreprises_roles.edit', compact('role')); // Retourne une vue pour éditer le rôle
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valider les données entrées
        $validated = $request->validate([
            'name' => 'required|string|max:255|regex:/^[^0-9]*$/',
        ]);

        // Trouver le rôle et mettre à jour les données
        $role = EntrepriseRole::findOrFail($id);
        $role->update($validated);

        // Rediriger vers la liste des rôles avec un message de succès
        return redirect()->route('entreprises_roles.index')->with('success', 'Rôle mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Trouver et supprimer le rôle
         $role = EntrepriseRole::findOrFail($id);
         $role->delete();

         // Rediriger vers la liste des rôles avec un message de succès
         return redirect()->route('entreprises_roles.index')->with('success', 'Rôle supprimé avec succès.');
    }
}
