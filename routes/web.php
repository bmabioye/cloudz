<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MentorshipController;

// Default Breeze Routes
Route::view('/', 'welcome');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('/profile', 'profile')
    ->middleware('auth')
    ->name('profile');

// CloudZone Custom Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/mentorship', [HomeController::class, 'mentorship'])->name('mentorship');



Route::get('/mentorship', [MentorshipController::class, 'landing'])->name('mentorship.landing');


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


// Include authentication routes from Breeze
require __DIR__ . '/auth.php';

