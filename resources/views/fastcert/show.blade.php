@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold">{{ $resource->title }}</h1>
        <p class="text-gray-600 mt-2">{{ $resource->description }}</p>

        @if ($resource->thumbnail)
            <img src="{{ asset('storage/' . $resource->thumbnail) }}" alt="{{ $resource->title }}" class="mt-4 w-full max-h-64 object-cover">
        @endif

        <div class="mt-6">
            <p class="text-sm text-gray-500">Category: {{ $resource->category->name }}</p>
            <p class="text-sm text-gray-500">Price: {{ $resource->is_premium ? '$' . $resource->price : 'Free' }}</p>
        </div>

        @if ($isPremium)
            @if ($userHasAccess)
                <a href="{{ asset('storage/' . $resource->file_path) }}" class="mt-6 block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Download Resource
                </a>
            @else
                <button onclick="redirectToSubscriptionPage()" class="mt-6 block bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    Subscribe to Access
                </button>
            @endif
        @else
            <a href="{{ asset('storage/' . $resource->file_path) }}" class="mt-6 block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                Download Resource
            </a>
        @endif
    </div>
</div>
@endsection