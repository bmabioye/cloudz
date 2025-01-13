@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-red-500">Payment Failed</h1>
    <p>Unfortunately, your payment could not be processed. Please try again.</p>
    <div><br />
    </div>
    <a href="/cart" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Back to Cart</a>
</div>
@endsection
