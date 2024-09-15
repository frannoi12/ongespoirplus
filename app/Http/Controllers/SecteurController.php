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
        return view('secteurs.create_or_update')->with('succes','');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSecteurRequest $request)
    {
        $request->validate([
            'nomSecteur' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'personnel_id' => 'required|exists:personnels,id',
        ]);

        $secteur = new Secteur();
        $secteur->fill($request->all());
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
        dd($secteur);
        // return view('secteurs.create_or_update', compact('secteur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Secteur $secteur)
    {
        dd($request,$secteur);
        // $request->validate([
        //     'nomSecteur' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
        //     'personnel_id' => 'required|exists:personnels,id'
        // ]);

        $secteur->fill($request->all());
        $secteur->save();

        return redirect()->route('secteurs.index')->with('success', 'Secteur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Secteur $secteur)
    {
        $secteur->delete();

        return redirect()->route('secteurs.index')->with('success', 'Secteur supprimé avec succès.');
    }
}
