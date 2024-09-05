<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePolitiqueRequest;
use App\Http\Requests\UpdatePolitiqueRequest;
use App\Models\Politique;
use App\Models\Personnel;
use Illuminate\Http\Request;

class PolitiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $politiques = Politique::query()
            ->when($search, function ($query, $search) {
                return $query->where('description', 'like', '%' . $search . '%');
            })
            ->with('personnel')
            ->paginate(10);
            // foreach ($politiques as $politique) {
            //     dd($politique->personnel->user->name);
            // }

        return view('politiques.index', compact('politiques', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personnels = Personnel::all();
        return view('politiques.create_or_update', compact('personnels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Politique $politique)
    {
        // Créer une nouvelle politique à partir des données du formulaire
        $request->validate([
            'description' => 'required|string|max:1000|regex:/^[\pL\s\-]+$/u',
            'personnel_id' => 'required|exists:personnels,id',
        ]);

        // Mise à jour des informations de la politique
        $politique->create([
            'description' => $request->description,
            'personnel_id' => $request->personnel_id,
        ]);

        // Rediriger vers la liste des politiques avec un message de succès
        return redirect()->route('politiques.index')->with('success', 'Politique créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Politique $politique)
    {
        return view('politiques.show', compact('politique'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Politique $politique)
    {
        $personnels = Personnel::all();
        return view('politiques.create_or_update', compact('politique','personnels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Politique $politique)
    {
            // Validation des données entrantes
    //dd($request);
    $request->validate([
        'description' => 'required|string|max:1000|regex:/^[\pL\s\-]+$/u',
        'personnel_id' => 'required|exists:personnels,id',
    ]);

    // Mise à jour des informations de la politique
    $politique->update([
        'description' => $request->description,
        'personnel_id' => $request->personnel_id,
    ]);

    // Redirection vers la liste des politiques avec un message de succès
    return redirect()->route('politiques.index')->with('success', 'Politique mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Politique $politique)
    {
        // Supprimer la politique spécifiée
        $politique->delete();

        // Rediriger vers la liste des politiques avec un message de succès
        return redirect()->route('politiques.index')->with('success', 'Politique supprimée avec succès.');
    }
}
