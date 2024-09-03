<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreLiquideRequest;
use App\Http\Requests\UpdateLiquideRequest;
use App\Models\Liquide;
use App\Models\Menage;
use App\Models\Paiement;
use Illuminate\Http\Request;

class LiquideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // dd($id);
        $menage = Menage::findOrFail($id);
        // dd($menage);
        return view('liquides.create',compact('menage'))->with('sucess','Paiement en liquide en cours');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'nbre_mois' => 'required|integer|min:1',
            'montant' => 'required|numeric|min:1000',
            'montant_lettre' => 'required|string|max:255',
            'objet' => 'required|string|max:255',
            'paiement_id' => 'required|exists:paiements,id',
        ], [
            'nbre_mois.required' => 'Le nombre de mois est requis.',
            'nbre_mois.integer' => 'Le nombre de mois doit être un entier.',
            'nbre_mois.min' => 'Le nombre de mois doit être au moins 1.',

            'montant.required' => 'Le montant est requis.',
            'montant.numeric' => 'Le montant doit être un nombre.',
            'montant.min' => 'Le montant minimum est de 1000 francs.',

            'montant_lettre.required' => 'Le montant en lettres est requis.',
            'montant_lettre.string' => 'Le montant en lettres doit être une chaîne de caractères.',
            'montant_lettre.max' => 'Le montant en lettres ne peut pas dépasser 255 caractères.',

            'objet.required' => 'L\'objet est requis.',
            'objet.string' => 'L\'objet doit être une chaîne de caractères.',
            'objet.max' => 'L\'objet ne peut pas dépasser 255 caractères.',

            'paiement_id.required' => 'Le paiement ID est requis.',
            'paiement_id.exists' => 'Le paiement ID sélectionné n\'existe pas.',

        //     'tariff_id.required' => 'Le tarif est requis.',
        //     'tariff_id.exists' => 'Le tarif sélectionné n\'existe pas.',
        ]);

        // dd($request);


        $liquides_paie = $request->input('paiement_id');

        $payer = Paiement::findOrFail($liquides_paie);

        $menag = Menage::findOrFail($payer->menage_id);

        $liquide = Liquide::updateOrCreate([
            'nbre_mois' => $request->input('nbre_mois'),
            'montant' => $request->input('montant'),
            'montant_lettre' => $request->input('montant_lettre'),
            'objet' => $request->input('objet'),
            'paiement_id' => $request->input('paiement_id'),
            'tariff_id' => $payer->tariff_id,
            'secteur_id' => $menag->secteur_id,
        ]);

        return redirect()->route('menages.index')->with('succes','Paiement en liquide effectuyé');


        // dd($menag);
    }

    /**
     * Display the specified resource.
     */
    public function show(Liquide $liquide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Liquide $liquide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLiquideRequest $request, Liquide $liquide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Liquide $liquide)
    {
        //
    }
}
