<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StorePaiementRequest;
use App\Http\Requests\UpdatePaiementRequest;
use App\Models\Menage;
use App\Models\Paiement;
use Illuminate\Http\Request;

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
    public function create($id)
    {
        // dd($id);
        $menage = Menage::findOrFail($id);
        return view('paiements.create', compact('menage'))->with('succes', 'Processus de paiement en cours'); // Assure-toi que cette vue existe et affiche un formulaire de paiement
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->input('menage_id'));
        // Valider les données de la requête
        // $request->validate([
        //     'type_paiement' => 'required|string|in:liquide,mobileMoney',  // Type de paiement doit être 'liquide' ou 'mobileMoney'
        // ]);

        // Déterminer le type de paiement en fonction du bouton cliqué
        $paymentMethod = $request->input('payment_method');

        // Mapper le type de paiement selon le bouton cliqué
        $typePaiement = $paymentMethod === 'liquide' ? 'liquide' : 'mobileMoney';

        // dd($typePaiement);

        $menage = Menage::findOrFail($request->input('menage_id'));

        // $user = auth()->user();

        // Affiche les informations de l'utilisateur
        //dd($user);
        // dd($menage);
        // dd($menage->tariff_id);

        $tariff_id = $menage->tariff_id;

        // dd($tariff_id);

        // Créer un nouvel enregistrement de paiement
        $paiement = Paiement::updateOrCreate([
            'type_paiement' => $typePaiement,
            'tariff_id' => $tariff_id,
            'personnel_id' => $request->input('personnel_id'),
            'menage_id' => $request->input('menage_id'),
        ]);
        // dd($paiement->menage);



        // En fonction du type de paiement, rediriger vers la méthode appropriée
        if ($paiement->type_paiement === 'liquide') {
            return view('liquides.create_or_update', compact('paiement','menage'));
        } elseif ($paiement->type_paiement === 'mobileMoney') {
            // dd($paiement);
            return redirect()->route('cinetpay.payment', compact('paiement','menage'));
        }

        // return redirect()->route('paiements.create')->with('status', 'Paiement enregistré avec succès');
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
