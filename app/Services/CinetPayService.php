<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

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

    public function initPayment($transactionId, $amount, $description, $customerEmail, $customerName)
    {
        $url = $this->baseUrl;
        $payload = [
            'apikey' => $this->apiKey,
            'site_id' => $this->siteId,
            'transaction_id' => $transactionId,
            'amount' => $amount,
            'currency' => 'XOF', // ou la devise souhaitée
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
}
