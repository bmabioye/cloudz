<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\PaymentIntent;
use App\Models\Purchase;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;
use App\Models\Invoice;

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
            $paymentIntentId = $request->input('payment_intent_id');

            if ($paymentIntent->status === 'succeeded') {
               
                // $user = $request->user();
               // Handle post-payment actions: save purchase details
                // Example:
                // Purchase::create([
                //     'user_id' => $user->id,
                //     'resource_id' => $request->input('resource_id'),
                //     'price_paid' => $paymentIntent->amount / 100,
                //     'purchase_date' => now(),
                //     'invoice_path' => "invoices/{$fileName}",
                // ]);

            // Send Invoice Email
            // $this->sendInvoiceEmail($user, $filePath);

            // event(new PaymentConfirmed($order));

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

    protected function sendInvoiceEmail($user, $filePath)
    {
        Mail::to($user->email)->send(new InvoiceMail($filePath));
    }

    public function storeInvoice(Request $request)
    {
        $paymentId = $request->input('payment_id'); // Stripe/Paystack payment ID
        $cartItems = $request->input('cart_items');
        $userId = auth()->id();
        $totalAmount = array_reduce($cartItems, function ($sum, $item) {
            return $sum + $item['price'] * $item['quantity'];
        }, 0);

        $invoice = Invoice::create([
            'user_id' => $userId,
            'payment_id' => $paymentId,
            'invoice_number' => 'INV-' . strtoupper(uniqid()),
            'items' => json_encode($cartItems),
            'total_amount' => $totalAmount,
            'issued_date' => now(),
        ]);

        return response()->json(['invoice' => $invoice]);
    }

}
