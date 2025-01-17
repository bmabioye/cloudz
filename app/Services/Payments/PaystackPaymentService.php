<?php

namespace App\Services\Payments;

use Illuminate\Support\Facades\Http;

class PaystackPaymentService implements PaymentGatewayInterface
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://api.paystack.co/';
    }

    public function createPaymentIntent(array $data)
    {
        $response = Http::withToken(config('services.paystack.secret'))
            ->post($this->baseUrl . 'transaction/initialize', [
                'amount' => $data['amount'] * 100, // Paystack expects amount in kobo
                'email' => $data['email'],
                'metadata' => $data['metadata'] ?? [],
            ]);

        return $response->json();
    }

    public function handleWebhook(array $payload)
    {
        // Handle Paystack webhook
    }
}