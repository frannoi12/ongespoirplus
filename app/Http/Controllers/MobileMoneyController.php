<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMobileMoneyRequest;
use App\Http\Requests\UpdateMobileMoneyRequest;
use App\Models\Menage;
use App\Models\MobileMoney;
use App\Models\Paiement;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MobileMoneyController extends Controller
{


    public function generatePdf($id)
    {
        $mobileMoney = MobileMoney::findOrFail($id);
        // dd($mobileMoney);

        $pdf = Pdf::loadView('exports.reçu', ['mobileMoney' => $mobileMoney]);

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
        //
        // $menage = Menage::findOrFail($id);

        $id = $request->query()['paiement'];
        $paiement = Paiement::findOrFail($id);

        return view('mobileMoneys.create_or_update',compact('paiement'))->with('sucess','Paiement en ligne en cours');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);

        // Validation des données
        $request->validate([
            'type_mobile_money' => 'required|in:flooz,tmoney',
            'nbre_mois' => 'required|integer|min:1',
            'montant' => 'required|integer|min:1000',
            'montant_lettre' => 'required|string',
            'objet' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'paiement_id' => 'nullable|exists:paiements,id',
        ],[
            // 'type_mobile_money.required' => 'Le type de Mobile Money est obligatoire.',
            // 'type_mobile_money.string' => 'Le type de Mobile Money doit être une chaîne de caractères.',
            // 'type_mobile_money.max' => 'Le type de Mobile Money ne doit pas dépasser 255 caractères.',

            'nbre_mois.required' => 'Le nombre de mois est obligatoire.',
            'nbre_mois.integer' => 'Le nombre de mois doit être un nombre entier.',
            'nbre_mois.min' => 'Le nombre de mois doit être au moins 1.',

            'montant.required' => 'Le montant est obligatoire.',
            'montant.integer' => 'Le montant doit être un nombre entier.',
            'montant.min' => 'Le montant doit être au moins de 1000 francs.',

            'montant_lettre.required' => 'Le montant en lettres est obligatoire.',
            'montant_lettre.string' => 'Le montant en lettres doit être une chaîne de caractères.',

            'objet.required' => 'L\'objet de la transaction est obligatoire.',
            'objet.string' => 'L\'objet doit être une chaîne de caractères.',
            'objet.max' => 'L\'objet ne doit pas dépasser 255 caractères.',

            // 'secteur_id.required' => 'Le secteur est obligatoire.',
            // 'secteur_id.exists' => 'Le secteur sélectionné n\'existe pas.',

            // 'tariff_id.required' => 'Le tarif est obligatoire.',
            // 'tariff_id.exists' => 'Le tarif sélectionné n\'existe pas.',

            'paiement_id.required' => 'Le paiement ID est requis.',
            'paiement_id.exists' => 'Le paiement ID sélectionné n\'existe pas.',
        ]);

        // dd($request);


        $mobilMoney_paie = $request->input('paiement_id');

        $payer = Paiement::findOrFail($mobilMoney_paie);

        $menag = Menage::findOrFail($payer->menage_id);

        // dd($payer);

        // Création d'une nouvelle transaction Mobile Money
        $mobilMoney = MobileMoney::updateOrCreate([
            'type_mobile_money' => $request->type_mobile_money,
            'devise' => $request->devise ?? 'XOF',
            'nbre_mois' => $request->nbre_mois,
            'montant' => $request->montant,
            'montant_lettre' => $request->montant_lettre,
            'objet' => $request->objet,
            'date_transaction' => now(),
            'tariff_id' => $payer->tariff_id,
            'secteur_id' => $menag->secteur_id,
            'paiement_id' => $request->paiement_id,
        ]);

        $id = $mobilMoney->id;

        return redirect()->route('mobiles.show', compact('id'))->with('succes', 'Paiement en ligne enrégistré avec succès.');
        // return redirect()->route('mobiles.index')->with('success', 'Transaction Mobile Money en cours .');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Trouver le paiement en liquide avec l'ID donné
        $mobile = MobileMoney::findOrFail($id);
        $paiement = $mobile->paiement;
        $menage = $paiement->menage;
        // dd($mobile);

        return view('mobileMoneys.show', compact('mobile','paiement','menage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $mobile = MobileMoney::findOrFail($id);

        $paiement = Paiement::findOrFail($mobile->paiement_id);

        return view('mobileMoneys.create_or_update',compact('mobile','paiement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nbre_mois' => 'required|integer|min:1',
            'montant' => 'required|integer|min:1000',
            'montant_lettre' => 'required|string',
            'objet' => 'required|string|max:255',
            'paiement_id' => 'nullable|exists:paiements,id',
        ],[
            // 'type_mobile_money.required' => 'Le type de Mobile Money est obligatoire.',
            // 'type_mobile_money.string' => 'Le type de Mobile Money doit être une chaîne de caractères.',
            // 'type_mobile_money.max' => 'Le type de Mobile Money ne doit pas dépasser 255 caractères.',

            'nbre_mois.required' => 'Le nombre de mois est obligatoire.',
            'nbre_mois.integer' => 'Le nombre de mois doit être un nombre entier.',
            'nbre_mois.min' => 'Le nombre de mois doit être au moins 1.',

            'montant.required' => 'Le montant est obligatoire.',
            'montant.integer' => 'Le montant doit être un nombre entier.',
            'montant.min' => 'Le montant doit être au moins de 1000 francs.',

            'montant_lettre.required' => 'Le montant en lettres est obligatoire.',
            'montant_lettre.string' => 'Le montant en lettres doit être une chaîne de caractères.',

            'objet.required' => 'L\'objet de la transaction est obligatoire.',
            'objet.string' => 'L\'objet doit être une chaîne de caractères.',
            'objet.max' => 'L\'objet ne doit pas dépasser 255 caractères.',

            // 'secteur_id.required' => 'Le secteur est obligatoire.',
            // 'secteur_id.exists' => 'Le secteur sélectionné n\'existe pas.',

            // 'tariff_id.required' => 'Le tarif est obligatoire.',
            // 'tariff_id.exists' => 'Le tarif sélectionné n\'existe pas.',

            'paiement_id.required' => 'Le paiement ID est requis.',
            'paiement_id.exists' => 'Le paiement ID sélectionné n\'existe pas.',
        ]);


        $mobileMoney = MobileMoney::findOrFail($id);

        $mobilMoney_paie = $request->input('paiement_id');

        $payer = Paiement::findOrFail($mobilMoney_paie);

        $menag = Menage::findOrFail($payer->menage_id);

        // Mise à jour de la transaction Mobile Money
        $mobileMoney->update([
            'type_mobile_money' => $payer->type_paiement,
            'devise' => $request->devise ?? 'XOF',
            'nbre_mois' => $request->nbre_mois,
            'montant' => $request->montant,
            'montant_lettre' => $request->montant_lettre,
            'objet' => $request->objet,
            'tariff_id' => $payer->tariff_id,
            'secteur_id' => $menag->secteur_id,
            'paiement_id' => $request->paiement_id,
        ]);

        return redirect()->route('mobiles.show', $mobileMoney->id)->with('success', 'Transaction Mobile Money mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MobileMoney $mobileMoney)
    {
        //
    }
}
