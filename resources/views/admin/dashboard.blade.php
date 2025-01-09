@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="p-4 container">
        <h1>Hello, {{ Auth::user()->name }}!</h1>
        
    </div>
<div class="p-4">
    <h2 class="text-2xl font-bold">Welcome to the Admin Dashboard</h2>
    <p class="mt-2">Use the sidebar to navigate to different sections.</p>
</div>
<form class="p-4" method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
@endsection
