<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MentorshipController;
use App\Http\Controllers\AdminResourceController;
use App\Http\Controllers\AdminPlanController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminCouponController;
use App\Http\Controllers\Admin\AdminDashboardController;


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

// Route::get('/bookings/availability/{start}/{end}', [BookingController::class, 'fetchAvailableSlots']);

Route::prefix('bookings')->group(function () {
    Route::get('/', [BookingController::class, 'index']);
    Route::post('/', [BookingController::class, 'store']);
    Route::get('/availability', [BookingController::class, 'getAvailability']);
});


Route::post('/bookings/confirm', [BookingController::class, 'confirmBooking']);
Route::get('/bookings/slots', [BookingController::class, 'getSlots']);
Route::put('/bookings/{id}/status', [BookingController::class, 'updateStatus']);
Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancelBooking']);
Route::post('/bookings/{id}/reschedule', [BookingController::class, 'rescheduleBooking']);

Route::middleware([])->group(function () {
    Route::get('/mentorship-services', [MentorshipController::class, 'getMentorshipServices']);
    Route::get('/mentorship-types', [MentorshipController::class, 'getMentorshipTypes']);
    Route::get('/mentorship-topics', [MentorshipController::class, 'getMentorshipTopics']); 
});


Route::prefix('admin')->middleware(AdminMiddleware::class)->group(function () {
    Route::resource('resources', AdminResourceController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('plans', AdminPlanController::class);
    Route::resource('coupons', AdminCouponController::class);
});

