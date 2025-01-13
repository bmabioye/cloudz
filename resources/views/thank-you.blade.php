@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-green-500">Thank You!</h1>
    <p>Your payment was successful, and your resources are now available for download.</p>
    <div><br />
    </div>
    <a href="/dashboard" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Go to Dashboard</a>
</div>
@endsection
