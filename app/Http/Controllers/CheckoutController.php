<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
use App\Models\Purchase;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum('price');

        return view('checkout.index', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('fastcert.resources')->with('error', 'Your cart is empty!');
        }

        // Simulate payment processing (e.g., using Stripe/PayPal integration)
        $paymentSuccess = true; // Set this based on actual payment response

        if (!$paymentSuccess) {
            return redirect()->route('checkout.index')->with('error', 'Payment failed. Please try again.');
        }

        // Store purchases for the user
        foreach ($cart as $id => $item) {
            Purchase::create([
                'user_id' => auth()->id(),
                'resource_id' => $id,
                'price_paid' => $item['price'],
                'purchase_date' => now()
            ]);
        }

        // Clear the cart
        session()->forget('cart');

        return redirect()->route('fastcert.resources')->with('success', 'Your purchase was successful!');
    }
}
