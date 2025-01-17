<?php

namespace App\Services\Payments;

use InvalidArgumentException;

class PaymentServiceFactory
{
    /**
     * Create the appropriate payment service instance.
     *
     * @param string $gateway
     * @return PaymentGatewayInterface
     * @throws InvalidArgumentException
     */
    public static function create(string $gateway): PaymentGatewayInterface
    {
        return match ($gateway) {
            'stripe' => new StripePaymentService(),
            'paystack' => new PaystackPaymentService(),
            // Add more gateways here
            default => throw new InvalidArgumentException("Unsupported payment gateway: {$gateway}"),
        };
    }
}
