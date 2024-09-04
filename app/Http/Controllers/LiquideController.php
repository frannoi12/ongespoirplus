<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreLiquideRequest;
use App\Http\Requests\UpdateLiquideRequest;
use App\Models\Liquide;
use App\Models\Menage;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LiquideController extends Controller
{
    public function generatePdf($id)
    {
        $liquide = Liquide::findOrFail($id);
        // dd($liquide);

        $pdf = Pdf::loadView('exports.reçu_liquide', ['liquide' => $liquide]);

        return $pdf->download('recu_paiement.pdf');
    }
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
    public function create(Request $request)
    {
        // dd($request->query()['paiement']);
        // dd($id);
        // $menage = Menage::findOrFail($id);
        // $paiement = $menage->paiements;
        // dd($menage);

        $id = $request->query()['paiement'];

        $paiement = Paiement::findOrFail($id);

        // dd($paiement);

        return view('liquides.create_or_update',compact('paiement'))->with('sucess', 'Paiement en liquide en cours');
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

        $id = $liquide->id;
        return redirect()->route('liquides.show', compact('id'))->with('succes', 'Paiement en liquide effectué avec succès.');
        // return redirect()->route('liquides.show', ['id' => $liquide->id])->with('succes', 'Paiement en liquide effectué avec succès.');

        // dd($liquide);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Trouver le paiement en liquide avec l'ID donné
        $liquid = Liquide::findOrFail($id);

        // dd($liquid);

        return view('liquides.show', compact('liquid'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Récupérer le paiement en liquide à modifier
        $liquid = Liquide::findOrFail($id);

        // Récupérer les données nécessaires (par exemple, le paiement associé)
        $paiement = Paiement::findOrFail($liquid->paiement_id);

        // Retourner la vue avec les données nécessaires
        return view('liquides.create_or_update', compact('liquid', 'paiement'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
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
        ]);

        $liquide = Liquide::findOrFail($id);
        $liquide->update([
            'nbre_mois' => $request->input('nbre_mois'),
            'montant' => $request->input('montant'),
            'montant_lettre' => $request->input('montant_lettre'),
            'objet' => $request->input('objet'),
            'paiement_id' => $request->input('paiement_id'),
        ]);

        return redirect()->route('liquides.show', $liquide->id)->with('success', 'Paiement en liquide mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Liquide $liquide)
    {
        //
    }
}
