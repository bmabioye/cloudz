@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Your Cart</h1>

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

    @if(empty($cart))
        <p class="text-gray-700">Your cart is empty. <a href="{{ route('fastcert.resources') }}" class="text-blue-500 hover:underline">Browse resources</a></p>
    @else
        <table class="table-auto w-full bg-white shadow rounded-lg">
            <thead>
                <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item['title'] }}</td>
                    <td class="border px-4 py-2">${{ number_format($item['price'], 2) }}</td>
                    <td class="border px-4 py-2">
                        <form method="POST" action="{{ route('cart.remove', $id) }}">
                            @csrf
                            <button type="submit" class="text-red-500 hover:underline">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-between items-center mt-4">
            <h2 class="text-xl font-bold">Total: ${{ number_format($total, 2) }}</h2>
            <!-- <a href="{{ route('checkout.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Proceed to Checkout</a> -->
            <button id="checkout-button" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">
                Proceed to Checkout
            </button>
        </div>
    @endif
</div>
<!-- Checkout Modal -->
<div id="checkout-modal" class="fixed top-0 left-0 w-full h-full flex items-center justify-center hidden bg-gray-900 bg-opacity-75">
    <div class="bg-white rounded-lg p-6 w-1/3">
        <h2 class="text-xl font-bold mb-4">Checkout</h2>
        <div id="payment-element"></div>
        <button id="pay-button" class="bg-green-500 text-white px-4 py-2 rounded mt-4">
            Pay Now
        </button>
        <button id="close-modal" class="text-red-500 mt-4">Cancel</button>
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{ config('services.stripe.key') }}");
    let elements, clientSecret;

    async function initializeStripe(amount) {
        const response = await fetch('/api/stripe/create-payment-intent', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ amount: amount }),
        });

        const data = await response.json();

        if (data.success) {
            clientSecret = data.clientSecret;

            elements = stripe.elements();
            const paymentElement = elements.create('card');
            paymentElement.mount('#payment-element');
        } else {
            alert(data.error);
        }
    }

    document.getElementById('checkout-button').addEventListener('click', () => {

        const totalAmnt = {{$total}} * 100;
        initializeStripe(totalAmnt);

        document.getElementById('checkout-modal').classList.remove('hidden');
    });

    document.getElementById('pay-button').addEventListener('click', async () => {
    const { error, paymentIntent } = await stripe.confirmCardPayment(clientSecret, {
        payment_method: {
            card: elements.getElement('card'),
        },
     });

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

            if (result.success) {
                //alert(result.message);
                window.location.href = '/thank-you'; // Redirect to success page
            } else {
               // alert(result.message);
                window.location.href = '/checkout-failed'; // Redirect to failure page
            }
        }
    });


    document.getElementById('close-modal').addEventListener('click', () => {
        document.getElementById('checkout-modal').classList.add('hidden');
    });
</script>

@endsection

