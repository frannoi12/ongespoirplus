<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSecteurRequest;
use App\Http\Requests\UpdateSecteurRequest;
use App\Models\Secteur;
use Illuminate\Http\Request;

class SecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Requête pour récupérer les secteurs avec ou sans filtre de recherche
        $secteurs = Secteur::query()
            ->when($search, function ($query, $search) {
                return $query->where('nomSecteur', 'like', '%' . $search . '%');
            })
            ->paginate(10); // Pagination des résultats

        // Retourne la vue avec les données des secteurs
        return view('secteurs.index', compact('secteurs', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('secteurs.create_or_update')->with('succes', 'Secteur créer avec succes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSecteurRequest $request)
    {
        $secteur = new Secteur();
        $secteur->fill($request->validated()); // Utilisation de validated() pour récupérer uniquement les données validées
        $secteur->save();

        return redirect()->route('secteurs.index')->with('success', 'Secteur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Secteur $secteur)
    {
        return view('secteurs.show', compact('secteur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Secteur $secteur)
    {
        return view('secteurs.create_or_update', compact('secteur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSecteurRequest $request, Secteur $secteur)
    {
        $secteur->fill($request->validated());
        $secteur->save();

        return redirect()->route('secteurs.index')->with('success', 'Secteur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Secteur $secteur)
    {
        try {
            $secteur->delete();
            return redirect()->route('secteurs.index')->with('success', 'Secteur supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('secteurs.index')->with('error', 'Erreur lors de la suppression du secteur.');
        }
    }
}
