@extends('layouts.app')

@section('content')
<div class="text-center py-10">
    <h1 class="text-4xl font-bold text-red-500">403</h1>
    <p class="mt-4">Unauthorized action. You do not have access to this page.</p>
    <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">Go back to Dashboard</a>
</div>
@endsection
