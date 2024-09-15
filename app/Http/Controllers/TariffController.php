<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreTariffRequest;
// use App\Http\Requests\UpdateTariffRequest;
use App\Models\Personnel;
use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $tariffs = Tariff::query()
            ->when($search, function ($query, $search) {
                return $query->where('designation', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('tariffs.index', compact('tariffs', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tariffs.create_or_update');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Tariff $tariff)
    {
        $request->validate([
            'designation' => 'required|string|max:255',
            'montant'     => 'required|integer',
            'personnel_id'=> 'required|exists:personnels,id'
        ], [
            'designation.string' => 'La description doit être une chaîne de caractères.',
            'montant.integer'    => 'Le montant doit être un nombre entier.',
            'montant' => 'required|integer',
            'personnel_id' => 'required|exists:personnels,id',
        ]);


        // Mise à jour des informations de la politique
        $tariff->updateOrCreate([
            'designation' => $request->designation,
            'montant' => $request->montant,
            'personnel_id' => $request->personnel_id,
        ]);
         // Rediriger vers la liste des politiques avec un message de succès
         return redirect()->route('politiques.index')->with('success', 'Tariff créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tariff $tariff)
    {
        return view('tariffs.show', compact('tariff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tariff $tariff)
    {
        $personnels = Personnel::all();
        return view('tariffs.create_or_update', compact('tariff','personnels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tariff $tariff)
    {
        $request->validate([
            'designation' => 'required|string|max:1000|regex:/^[\pL\s\-]+$/u',
            'montant' => 'required|integer',
            'personnel_id' => 'required|exists:personnels,id'
        ]);

        // Mise à jour des informations de la politique
        $tariff->update([
            'description' => $request->designation,
            'montant' => $request->montant,
            'personnel_id' => $request->personnel_id,
        ]);

        // Redirection vers la liste des politiques avec un message de succès
        return redirect()->route('tariffs.index')->with('success', 'tariff mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tariff $tariff)
    {
        // Supprimer la politique spécifiée
       $tariff->delete();

       // Rediriger vers la liste des politiques avec un message de succès
       return redirect()->route('tariffs.index')->with('success', 'tariff supprimée avec succès.');
    }
}
