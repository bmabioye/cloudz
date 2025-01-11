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
            <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded">Proceed to Checkout</a>
        </div>
    @endif
</div>
@endsection

