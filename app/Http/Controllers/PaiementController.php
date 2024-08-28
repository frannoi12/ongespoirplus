<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaiementRequest;
use App\Http\Requests\UpdatePaiementRequest;
use App\Models\Menage;
use App\Models\Paiement;

class PaiementController extends Controller
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
    public function create()
    {
        // $menages = Menage::all();
        return view('paiements.create'); // Assure-toi que cette vue existe et affiche un formulaire de paiement
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaiementRequest $request)
    {
        // Valider les données de la requête
        $validated = $request->validated();

        // Créer un nouvel enregistrement de paiement
        $paiement = Paiement::create([
            'type_paiement' => $validated['type_paiement'],
            'tariff_id' => $validated['tariff_id'] ?? null,
            'personnel_id' => $validated['personnel_id'] ?? null,
        ]);

        // En fonction du type de paiement, rediriger vers la méthode appropriée
        if ($paiement->type_paiement === 'liquide') {
            return $this->handleCashPayment($paiement);
        } elseif ($paiement->type_paiement === 'mobileMoney') {
            return $this->handleMobileMoneyPayment($paiement);
        }

        return redirect()->route('paiements.create')->with('status', 'Paiement enregistré avec succès');
    }

    /**
     * Gère les paiements en liquide.
     */
    private function handleCashPayment(Paiement $paiement)
    {
        // Logique spécifique pour les paiements en liquide
        // Par exemple, enregistrer des informations supplémentaires, envoyer des notifications, etc.

        // Rediriger ou répondre avec un message de succès
        return redirect()->route('home')->with('status', 'Paiement en liquide traité avec succès');
    }

    /**
     * Gère les paiements par mobile money.
     */
    private function handleMobileMoneyPayment(Paiement $paiement)
    {
        // Logique spécifique pour les paiements mobile money
        // Par exemple, intégrer avec une API de paiement mobile money

        // Rediriger ou répondre avec un message de succès
        return redirect()->route('home')->with('status', 'Paiement mobile money traité avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaiementRequest $request, Paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paiement $paiement)
    {
        //
    }
}
