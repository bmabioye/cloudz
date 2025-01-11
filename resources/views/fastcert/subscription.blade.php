@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center mb-6">Choose Your Subscription Plan</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($plans as $plan)
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-bold">{{ $plan->name }}</h2>
            <p class="text-gray-600 mt-2">{{ $plan->description }}</p>
            <p class="text-lg font-semibold mt-4">
                {{ $plan->price ? '$' . number_format($plan->price, 2) : 'Free' }}
            </p>
            <p class="text-sm text-gray-500 mt-2">
                Duration: {{ $plan->duration_months }} month{{ $plan->duration_months > 1 ? 's' : '' }}
            </p>
            <ul class="mt-4 text-sm text-gray-600">
            @foreach(is_string($plan->features) ? json_decode($plan->features, true) : $plan->features as $feature)
                <li class="flex items-center">
                    <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>{{ $feature }}</span>
                </li>
            @endforeach
        </ul>
            <button onclick="subscribeToPlan({{ $plan->id }})" 
                class="mt-6 block w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Subscribe
            </button>
        </div>
        @endforeach
    </div>
</div>
<script>
    function subscribeToPlan(planId) {
    // Example: Redirect to payment/confirmation page for subscription
    window.location.href = `/fastcert/subscribe/${planId}`;
}
    </script>
@endsection

