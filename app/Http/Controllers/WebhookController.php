<?php

namespace App\Http\Controllers;

use App\Events\PurchaseSuccessful;
use Illuminate\Http\Request;
use App\Services\Payments\PaymentServiceFactory;

class WebhookController extends Controller
{
    /**
     * Handle Stripe webhooks.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function handleStripe(Request $request)
    {
        $paymentIntentId = $request->input('payment_intent_id');
        $stripeService = PaymentServiceFactory::create('stripe');

        $verification = $stripeService->verifyPayment($paymentIntentId);

        if ($verification['success']) {

            $userId = $paymentIntent['metadata']['user_id'];
            $purchaseDetails = json_decode($paymentIntent['metadata']['purchase_details'], true);

            PurchaseSuccessful::dispatch($userId, $purchaseDetails);

            return response()->json(['status' => 'success', 'message' => $verification['message']], 200);
        }

        return response()->json(['status' => 'failure', 'message' => $verification['message']], 400);
    }

    /**
     * Handle Paystack webhooks.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handlePaystack(Request $request)
    {
        try {
            $service = PaymentServiceFactory::create('paystack'); // Get Paystack service
            $service->handleWebhook($request->all()); // Pass webhook payload to the service
            return response()->json(['status' => 'success'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
