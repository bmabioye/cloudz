<?php

namespace App\Services\Payments;

interface PaymentGatewayInterface
{
    public function createPaymentIntent(array $data);
    public function handleWebhook(array $payload);
}
