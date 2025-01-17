<?php

namespace App\Services\Payments;

use Stripe\StripeClient;

class StripePaymentService implements PaymentGatewayInterface
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('services.stripe.secret'));
    }

    /**
     * Create a payment intent for Stripe.
     *
     * @param array $data
     * @return \Stripe\PaymentIntent
     */
    public function createPaymentIntent(array $data)
    {
        return $this->stripe->paymentIntents->create([
            'amount' => $data['amount'], // Amount in cents
            'currency' => $data['currency'], // e.g., 'usd'
            'description' => $data['description'] ?? 'Purchase from FastCert',
            'metadata' => $data['metadata'] ?? [], // Optional metadata
            'payment_method_types' => ['card'], // Restrict to card payments
        ]);
    }


    public function verifyPayment(string $paymentIntentId): array
    {
        try {
            $paymentIntent = $this->stripe->paymentIntents->retrieve($paymentIntentId);

            if ($paymentIntent->status === 'succeeded') {
                return [
                    'success' => true,
                    'message' => 'Payment successful',
                    'paymentIntent' => $paymentIntent,
                ];
            }

            return [
                'success' => false,
                'message' => 'Payment not completed.',
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * Handle incoming Stripe webhook events.
     *
     * @param array $payload
     * @return void
     */
    public function handleWebhook(array $payload)
    {
        $event = $payload['event'] ?? null;

        if (!$event) {
            throw new \Exception('Invalid webhook payload.');
        }

        // Example webhook handling
        switch ($event['type']) {
            case 'payment_intent.succeeded':
                $paymentIntent = $event['data']['object'];
                // Process successful payment (e.g., update purchase records)
                $this->processSuccessfulPayment($paymentIntent);
                break;

            case 'payment_intent.payment_failed':
                $paymentIntent = $event['data']['object'];
                // Handle payment failure logic here
                $this->processFailedPayment($paymentIntent);
                break;

            default:
                // Log unhandled webhook types for later review
                \Log::info('Unhandled webhook type: ' . $event['type']);
        }
    }

    /**
     * Process a successful payment.
     *
     * @param \Stripe\PaymentIntent $paymentIntent
     * @return void
     */
    private function processSuccessfulPayment($paymentIntent)
    {
        // Update database, trigger events, or notify users as necessary
        \Log::info('Payment succeeded: ' . $paymentIntent['id']);
    }

    /**
     * Process a failed payment.
     *
     * @param \Stripe\PaymentIntent $paymentIntent
     * @return void
     */
    private function processFailedPayment($paymentIntent)
    {
        // Log the failure or take corrective action
        \Log::error('Payment failed: ' . $paymentIntent['id']);
    }
}
