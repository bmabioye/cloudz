<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PurchaseSuccessful;
use App\Models\Purchase;
use App\Services\InvoiceGenerator; // Assuming you have this service
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;
use App\Models\Invoice;

class ProcessPurchaseSuccessful
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PurchaseSuccessful $event)
    {
        $userId = $event->userId;
        $purchaseDetails = $event->purchaseDetails;

        // Update the purchases table
        foreach ($purchaseDetails as $item) {
            Purchase::create([
                'user_id' => $userId,
                'resource_id' => $item['resource_id'],
                'price_paid' => $item['price'],
                'purchase_date' => now(),
            ]);
        }
    
        // Generate the invoice
        $invoicePath = app(InvoiceGenerator::class)->generateInvoice($userId, $purchaseDetails);

        // Send the invoice via email
        Mail::to(auth()->user()->email)->send(new \App\Mail\InvoiceMail($invoicePath));
    }

    protected function sendInvoiceEmail($user, $filePath)
    {
        Mail::to($user->email)->send(new InvoiceMail($filePath));
    }

    // public function storeInvoice(Request $request)
    // {
    //     $paymentId = $request->input('payment_id'); // Stripe/Paystack payment ID
    //     $cartItems = $request->input('cart_items');
    //     $userId = auth()->id();
    //     $totalAmount = array_reduce($cartItems, function ($sum, $item) {
    //         return $sum + $item['price'] * $item['quantity'];
    //     }, 0);

    //     $invoice = Invoice::create([
    //         'user_id' => $userId,
    //         'payment_id' => $paymentId,
    //         'invoice_number' => 'INV-' . strtoupper(uniqid()),
    //         'items' => json_encode($cartItems),
    //         'total_amount' => $totalAmount,
    //         'issued_date' => now(),
    //     ]);

    //     return response()->json(['invoice' => $invoice]);
    // }
}
