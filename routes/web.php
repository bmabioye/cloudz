<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Livewire\Actions\Logout;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MentorshipController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;

// Default Breeze Routes
Route::view('/', 'welcome')->name('welcome');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('/profile', 'profile')
    ->middleware('auth')
    ->name('profile');

Route::post('/logout', Logout::class)->name('logout');

// CloudZone Custom Routes
Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('/mentorship/booking', [MentorshipController::class, 'showBookingForm'])->name('mentorship.booking');
Route::post('/mentorship/booking', [MentorshipController::class, 'storeBooking'])->name('mentorship.booking.store');


Route::get('/mentorship', [MentorshipController::class, 'landing'])->name('mentorship.landing');
Route::get('/mentorship/{id}/book', [BookingController::class, 'book'])->name('mentorship.book');
Route::post('/mentorship', [BookingController::class, 'store']); // Create booking

Route::prefix('services')->group(function () {
    Route::get('/cloud-solutions', [ServiceController::class, 'cloudSolutions'])->name('services.cloud-solutions');
    Route::get('/cybersecurity', [ServiceController::class, 'cybersecurity'])->name('services.cybersecurity');
    Route::get('/grc', [ServiceController::class, 'grc'])->name('services.grc');
    Route::get('/one-on-one-coaching', [ServiceController::class, 'coaching'])->name('services.coaching');
    Route::get('/webinars-workshops', [ServiceController::class, 'webinars'])->name('services.webinars');
    Route::get('/certification-study-packs', [ServiceController::class, 'studyPacks'])->name('services.study-packs');
    Route::get('/ebooks', [ServiceController::class, 'ebooks'])->name('services.ebooks');
    Route::get('/subscription-plans', [ServiceController::class, 'subscriptions'])->name('services.subscription-plans');
});



Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // Add other admin routes here
});


// Admin Routes
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard'); // Admin dashboard view
    })->name('admin.dashboard');

    Route::resource('resources', ResourceController::class);
    Route::resource('plans', PlanController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('coupons', CouponController::class);
});

// Include authentication routes from Breeze
require __DIR__ . '/auth.php';

