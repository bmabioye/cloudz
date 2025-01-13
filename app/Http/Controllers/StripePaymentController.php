<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\PaymentIntent;

class StripePaymentController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create a PaymentIntent
            $paymentIntent = PaymentIntent::create([
                'amount' => $request->amount, // Amount in cents
                // 'amount' => $validated['amount'], // Use the dynamic amount
                'currency' => 'usd',
                'description' => 'Purchase from FastCert',
                'metadata' => ['order_id' => $request->order_id],
                'payment_method_types' => ['card'], // Specify explicitly
            ]);

            return response()->json([
                'success' => true,
                'clientSecret' => $paymentIntent->client_secret,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function handlePayment(Request $request)
    {
        $paymentIntentId = $request->input('payment_intent_id');

        try {
            $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
            $paymentIntent = $stripe->paymentIntents->retrieve($paymentIntentId);

            if ($paymentIntent->status === 'succeeded') {
                // Handle post-payment actions: save purchase details
                // Example:
                // Purchase::create([
                //     'user_id' => auth()->id(),
                //     'resource_id' => $request->input('resource_id'),
                //     'amount' => $paymentIntent->amount / 100,
                // ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Payment successful!',
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Payment not completed.',
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

}
