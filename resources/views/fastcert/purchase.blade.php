@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Purchase {{ $resource->title }}</h2>
    <p class="mb-4">{{ $resource->description }}</p>
    <p class="mb-4 text-lg font-bold">Price: ${{ $resource->price }}</p>

    <form action="{{ route('resources.processPurchase', $resource->id) }}" method="POST">
        @csrf
        <button 
            type="submit" 
            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition"
        >
            Confirm Purchase
        </button>
        <a href="{{ route('fastcert.resources') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
    </form>
</div>
@endsection
