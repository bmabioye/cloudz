@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
<div class="w-full max-w-4xl bg-white shadow-md rounded-lg p-6">
<div class="container mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Your Cart</h1>
    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('info'))
        <div class="bg-blue-100 text-blue-700 p-4 rounded mb-4">
            {{ session('info') }}
        </div>
    @endif
    <!-- Cart Items -->
    <div id="cart-container" class="bg-white shadow rounded-lg p-6">
        @if (session()->has('cart') && count(session('cart')) > 0)
            <table id="cart-table" class="w-full text-left">
                <thead>
                    <tr>
                    <th class="border-b-2 border-gray-200 py-2">Resource</th>
                    <th class="border-b-2 border-gray-200 py-2 text-right">Price</th>
                    <th class="border-b-2 border-gray-200 py-2 text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session('cart') as $id => $item)
                        <tr data-id="{{ $id }}">
                            <td class="py-4 border-b border-gray-200">{{ $item['title'] }}</td>
                            <td class="py-4 border-b border-gray-200 text-right">${{ number_format($item['price'], 2) }}</td>
                            <td class="py-4 border-b border-gray-200 text-right">
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button  type="submit" class="remove-item bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600" data-id="{{ $id }}">
                                    Remove
                                </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="cart-total" class="mt-6 flex justify-between items-center">
                <p class="font-bold"><h2 class="text-xl font-bold text-gray-700">Total:</h2> <span class="text-xl font-bold text-gray-800">${{ number_format(collect(session('cart'))->sum('price'), 2) }}</span></p>
            </div>
        @else
            <p id="empty-cart-message" class="text-gray-700">Your cart is empty. <a href="{{ route('fastcert.resources') }}" class="text-blue-500 hover:underline">Browse resources</a></p>
        @endif
    </div>

    <!-- Payment Form -->
    @if (session()->has('cart') && count(session('cart')) > 0)
        <div id="checkout-container" class="mt-8">
            <h2 class="text-xl font-bold mb-4">Checkout</h2>

            <form id="checkoutForm" method="POST" action="{{ route('checkout.process') }}">
                @csrf
                <label for="gateway" class="block mb-2 font-medium">Select Payment Gateway</label>
                <select name="gateway" id="gateway" class="w-full border rounded-lg px-4 py-2 mb-4">
                    <option value="stripe">Stripe</option>
                    <option value="paystack">Paystack</option>
                </select>

                <div class="mt-6 flex items-center justify-between">
                <button type="button" id="initializePayment"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600">
                    Proceed to Payment
                </button>
             
              
              <a href="{{ route('fastcert.resources') }}" class="cta-btn bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 ml-auto rounded-lg shadow font-medium">Add More resources</a>
              </div>  
            </form>
  
        </div>
    @endif
</div>
</div>
</div>
<!-- Payment Modal -->
<div id="paymentModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg relative">
        <!-- <button id="closeModal" class="absolute top-2 right-2 text-gray-600 hover:text-red-500">&times;</button> -->
        <h2 class="text-xl font-bold mb-4">Complete Your Payment</h2>
        <div id="payment-element" class="mb-6"></div>
        <button id="pay-button" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">
            Pay Now
        </button>
        <button id="closeModal" class="text-red-500 mt-4">Cancel</button>
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const modal = document.getElementById('paymentModal');
    const closeModal = document.getElementById('closeModal');
    const initializePaymentButton = document.getElementById('initializePayment');
    const paymentElementContainer = document.getElementById('payment-element');
    const cartContainer = document.getElementById('cart-container');
    const emptyCartMessage = document.getElementById('empty-cart-message');
    let stripe = Stripe("{{ config('services.stripe.key') }}");
    let clientSecret;
    let elements;

    // Initialize Payment
    initializePaymentButton.addEventListener('click', async function () {
        const gateway = document.getElementById('gateway').value;
        const amount = {{ collect(session('cart'))->sum('price')*100}}; // Convert to cents
        console.log(amount);
        console.log(gateway);
        try {
            const response = await fetch('/api/stripe/create-payment-intent', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ amount, gateway }),
            });

            const data = await response.json();

            console.log(data);
            
            if (data.success && data.payment_intent?.client_secret) {
                clientSecret = data.payment_intent.client_secret;
                elements = stripe.elements();
                const paymentElement = elements.create('card');
                paymentElement.mount(paymentElementContainer);
                // console.log(data.payment_intent.client_secret);
                document.getElementById('paymentModal').classList.remove('hidden');
              
            } else {
                alert(data.error || 'Failed to initialize payment.');
            }
        } catch (error) {
            console.error('Error during payment initialization:', error);
            alert('An error occurred. Please try again.');
        }
    });

    // process the payment
    document.getElementById('pay-button').addEventListener('click', async () => {
    const { error, paymentIntent } = await stripe.confirmCardPayment(clientSecret, {
        payment_method: {
            card: elements.getElement('card'),
        },
     });
        // console.log(clientSecret);
        if (error) {
            window.location.href = '/checkout-failed'; // Redirect to failure page
            // alert('Payment failed: ' + error.message);
        } else {
            // Send the paymentIntent.id to the backend for verification
            const response = await fetch('/api/stripe/handle-payment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    payment_intent_id: paymentIntent.id,
                    resource_id: 1, // Example resource ID
                }),
            });

            const result = await response.json();
            console.log(result);
            if (result.success) {
                //alert(result.message);
                window.location.href = '/thank-you'; // Redirect to success page
            } else {
               // alert(result.message);
                window.location.href = '/checkout-failed'; // Redirect to failure page
            }
        }
    });

    // Close Modal
    document.getElementById('closeModal').addEventListener('click', () => {
    document.getElementById('paymentModal').classList.add('hidden');
    });


let cartItems = 0;

// Function to update cart badge
function updateCartBadge(count) {
    const badge = document.getElementById('cart-badge');
    if (count > 0) {
        badge.textContent = count;
        badge.classList.remove('hidden');
    } else {
        badge.textContent = '0';
        badge.classList.add('hidden');
    }
}

// Fetch cart count from the backend on page load
document.addEventListener('DOMContentLoaded', async () => {
    try {
        const response = await fetch('/api/cart-count'); // Adjust this route if necessary
        const data = await response.json();
        updateCartBadge(data.count);
    } catch (error) {
        console.error('Failed to fetch cart count:', error);
    }
});

// Navigate to cart page when the cart icon is clicked
document.getElementById('cart-button').addEventListener('click', () => {
    window.location.href = '/cart';
});

</script>
@endsection
