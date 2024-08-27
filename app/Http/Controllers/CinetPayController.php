<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CinetPayService;

class CinetPayController extends Controller
{
    protected $cinetPayService;

    public function __construct(CinetPayService $cinetPayService)
    {
        $this->cinetPayService = $cinetPayService;
    }

    // Méthode pour afficher la page de paiement
    public function showPaymentForm()
    {
        return view('cinetpay.payment'); // Vue pour le formulaire de paiement
    }

    // Méthode pour traiter le paiement
    public function processPayment(Request $request)
    {
        $transaction_id = date("YmdHis");
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $description = "Test-Laravel"; // ou toute autre description
        $customerEmail = $request->input('customer_email');
        $customerName = $request->input('customer_name');

        // Initialiser le paiement via le service CinetPay
        $payment_link = $this->cinetPayService->initPayment($transaction_id, $amount, $description, $customerEmail, $customerName, $currency);

        if ($payment_link) {
            return redirect($payment_link); // Rediriger vers le lien de paiement
        } else {
            return back()->with('error', 'Une erreur est survenue lors de l\'initialisation du paiement.');
        }
    }

    // Méthode pour traiter le callback après le paiement
    public function callback(Request $request)
    {
        $transactionId = $request->input('transaction_id');
        $status = $this->cinetPayService->verifyPayment($transactionId);

        if ($status === 'success') {
            // Logique après un paiement réussi (mettre à jour la base de données, etc.)
            return view('cinetpay.callback')->with('success', 'Paiement réussi !');
        } else {
            // Logique après un échec de paiement
            return view('cinetpay.callback')->with('error', 'Le paiement a échoué.');
        }
    }

    // Méthode pour traiter la notification asynchrone de CinetPay
    public function notify(Request $request)
    {
        $this->cinetPayService->handleNotification($request);
        return response()->json(['message' => 'Notification traitée avec succès'], 200);
    }
}
