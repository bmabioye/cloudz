<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Payments\PaymentServiceFactory;
use App\Models\Purchase;

class CheckoutController extends Controller
{
    /**
     * Display the checkout page.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum('price');

        return view('checkout.index', compact('cart', 'total'));
    }

    /**
     * Create a payment intent.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPaymentIntent(Request $request)
    {
        $gateway = $request->input('gateway', 'stripe'); // Default to Stripe
        $service = PaymentServiceFactory::create($gateway);

        $data = [
            'amount' => $request->amount, // Convert to cents/kobo
            'currency' => 'usd',
            'description' => 'Purchase from FastCert',
            'payment_method_types' => ['card'],
            'metadata' => [
                'order_id' => $request->order_id,
                'resource_id' => $request->resource_id,
                'price_paid' => $request->amount,
            ],
        ];

        try {
            $paymentIntent = $service->createPaymentIntent($data);

            return response()->json([
                'success' => true,
                'payment_intent' => $paymentIntent,
            ], 200);
        } catch (\Exception $e) {
            \Log::error('Create Payment Intent Error:', ['message' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Process the checkout after payment.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('checkout.index')->with('error', 'Your cart is empty.');
        }

        // Simulate payment confirmation (replace with actual logic)
        $gateway = $request->input('gateway', 'stripe');
        $service = PaymentServiceFactory::create($gateway);

        try {
            $paymentConfirmation = $service->confirmPayment($request->input('payment_intent_id'));

            if (!$paymentConfirmation['success']) {
                return redirect()->route('checkout.index')->with('error', $paymentConfirmation['message']);
            }

            // Save purchases
            foreach ($cart as $id => $item) {
                Purchase::create([
                    'user_id' => auth()->id(),
                    'resource_id' => $id,
                    'price_paid' => $item['price'],
                    'purchase_date' => now(),
                ]);
            }

            // Clear cart
            session()->forget('cart');

            return redirect()->route('fastcert.resources')->with('success', 'Your purchase was successful!');
        } catch (\Exception $e) {
            \Log::error('Checkout Process Error:', ['message' => $e->getMessage()]);
            return redirect()->route('checkout.index')->with('error', 'An error occurred. Please try again.');
        }
    }

    // public function handlePaymentStripe(Request $request)
    // {
    //     $paymentIntentId = $request->input('payment_intent_id');

    //     try {

    //         $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
    //         $paymentIntent = $stripe->paymentIntents->retrieve($paymentIntentId);
    //         $paymentIntentId = $request->input('payment_intent_id');

    //         if ($paymentIntent->status === 'succeeded') {
    //             \Log::info('Payment succeeded: ' . $paymentIntent);
    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'Payment successful!',
    //             ]);
    //         }

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Payment not completed.',
    //         ], 400);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => $e->getMessage(),
    //         ], 500);
    //     }
    // }
}
