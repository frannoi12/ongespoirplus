<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use App\Models\MobileMoney; // Assure-toi d'avoir un modèle MobileMoney pour gérer les paiements

class CinetPayService
{
    protected $client;
    protected $apiKey;
    protected $siteId;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('CINETPAY_API_KEY');
        $this->siteId = env('CINETPAY_SITE_ID');
        $this->baseUrl = env('CINETPAY_BASE_URL');
    }

    public function initPayment($transactionId, $amount, $description, $customerEmail, $customerName, $currency = 'XOF')
    {
        $url = $this->baseUrl;
        $payload = [
            'apikey' => $this->apiKey,
            'site_id' => $this->siteId,
            'transaction_id' => $transactionId,
            'amount' => $amount,
            'currency' => $currency,
            'description' => $description,
            'customer_email' => $customerEmail,
            'customer_name' => $customerName,
            'return_url' => route('cinetpay.callback'),
            'notify_url' => route('cinetpay.notify'),
        ];

        try {
            $response = $this->client->post($url, [
                'json' => $payload
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Log::error('CinetPay initPayment Error: ' . $e->getMessage());
            return null;
        }
    }

    public function verifyPayment($transactionId)
    {
        $url = 'https://api-checkout.cinetpay.com/v2/payment/check';
        $payload = [
            'apikey' => $this->apiKey,
            'site_id' => $this->siteId,
            'transaction_id' => $transactionId
        ];

        try {
            $response = $this->client->post($url, [
                'json' => $payload
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Log::error('CinetPay verifyPayment Error: ' . $e->getMessage());
            return null;
        }
    }

    public function handleNotification($request)
    {
        // Récupérer les données de la notification
        $transactionId = $request->input('transaction_id');
        $status = $request->input('status');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        // Log les informations reçues
        Log::info('CinetPay Notification Received', [
            'transaction_id' => $transactionId,
            'status' => $status,
            'amount' => $amount,
            'currency' => $currency
        ]);

        // Mettre à jour la base de données avec le statut de la transaction
        $mobileMoney = MobileMoney::where('ref_transaction', $transactionId)->first();

        if ($mobileMoney) {
            $mobileMoney->type_mobile_money = 'CINETPAY'; // ou autre valeur selon le type
            $mobileMoney->ref_transaction = $transactionId;
            $mobileMoney->devise = $currency;
            $mobileMoney->date_transaction = now();
            $mobileMoney->save();

            // Optionnel : envoyer une notification à l'utilisateur ou exécuter d'autres actions
        } else {
            Log::warning('Transaction not found for ID: ' . $transactionId);
        }
    }
}
