@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Book a Session</h1>
        <p>Service: {{ $service->service_name }}</p>
        <p>Price: ${{ $service->price }}</p>
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="mentorship_service_id" value="{{ $service->id }}">
            <label for="date">Select Date:</label>
            <input type="date" name="booking_date" required>
            <label for="time">Select Time:</label>
            <input type="time" name="booking_time" required>
            <button type="submit" class="btn btn-success">Confirm Booking</button>
        </form>
    </div>
@endsection
