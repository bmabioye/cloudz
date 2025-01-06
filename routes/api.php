<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;


Route::prefix('bookings')->group(function () {
    Route::get('/', [BookingController::class, 'index']); // List mentorship services
    Route::get('/availability/{serviceId}', [BookingController::class, 'showAvailability']); // Show slots
    Route::post('/', [BookingController::class, 'store']); // Create booking
    Route::put('/{bookingId}/status', [BookingController::class, 'updateStatus']); // Update booking status
});

// Example route for testing authenticated users
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/bookings/availability/{start}/{end}', [BookingController::class, 'fetchAvailableSlots']);

Route::prefix('bookings')->group(function () {
    Route::get('/', [BookingController::class, 'index']);
    Route::post('/', [BookingController::class, 'store']);
});

Route::get('/api/bookings/availability/{serviceId}/{date}', [BookingController::class, 'showAvailability']);
Route::get('/api/bookings/slots', [BookingController::class, 'getSlots']);
