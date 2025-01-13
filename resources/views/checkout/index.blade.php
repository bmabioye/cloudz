@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Checkout</h1>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <table class="table-auto w-full bg-white shadow rounded-lg">
        <thead>
            <tr>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
            <tr>
                <td class="border px-4 py-2">{{ $item['title'] }}</td>
                <td class="border px-4 py-2">${{ number_format($item['price'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex justify-between items-center mt-4">
        <h2 class="text-xl font-bold">Total: ${{ number_format($total, 2) }}</h2>
        <form method="POST" action="{{ route('checkout.process') }}">
            @csrf
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Pay Now</button>
        </form>
    </div>
</div>
<!-- Checkout Modal -->

<script src="https://js.stripe.com/v3/"></script>

@endsection
