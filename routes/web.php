<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Livewire\Actions\Logout;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MentorshipController;
use App\Http\Controllers\AdminResourceController;
use App\Http\Controllers\AdminPlanController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminCouponController;

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

// Admin Routes
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard'); // Admin dashboard view
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/resources', [AdminResourceController::class, 'index'])->name('admin.resources.index');
        Route::get('/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/plans', [AdminPlanController::class, 'index'])->name('admin.plans.index');
        Route::get('/coupons', [AdminCouponController::class, 'index'])->name('admin.coupons.index');
        // Add more admin routes here...
    });
});




// Admin Subscription Plans CRUD Routes
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    // Route::get('/plans', [AdminPlanController::class, 'index'])->name('plans.index');
    Route::get('/plans/create', [AdminPlanController::class, 'create'])->name('plans.create');
    Route::post('/plans', [AdminPlanController::class, 'store'])->name('plans.store');
    Route::get('/plans/{plan}/edit', [AdminPlanController::class, 'edit'])->name('plans.edit');
    Route::put('/plans/{plan}', [AdminPlanController::class, 'update'])->name('plans.update');
    Route::delete('/plans/{plan}', [AdminPlanController::class, 'destroy'])->name('plans.destroy');
});


// Admin CRUD Routes for Categories
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    // Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');

    // Admin CRUD Routes for Resources
    // Route::get('/resources', [AdminResourceController::class, 'index'])->name('resources.index');
    Route::get('/resources/create', [AdminResourceController::class, 'create'])->name('resources.create');
    Route::post('/resources', [AdminResourceController::class, 'store'])->name('resources.store');
    Route::get('/resources/{resource}/edit', [AdminResourceController::class, 'edit'])->name('resources.edit');
    Route::put('/resources/{resource}', [AdminResourceController::class, 'update'])->name('resources.update');
    Route::delete('/resources/{resource}', [AdminResourceController::class, 'destroy'])->name('resources.destroy');

    // Admin CRUD Routes for Coupons
    // Route::get('/coupons', [AdminCouponController::class, 'index'])->name('coupons.index');
    Route::get('/coupons/create', [AdminCouponController::class, 'create'])->name('coupons.create');
    Route::post('/coupons', [AdminCouponController::class, 'store'])->name('coupons.store');
    Route::get('/coupons/{coupon}/edit', [AdminCouponController::class, 'edit'])->name('coupons.edit');
    Route::put('/coupons/{coupon}', [AdminCouponController::class, 'update'])->name('coupons.update');
    Route::delete('/coupons/{coupon}', [AdminCouponController::class, 'destroy'])->name('coupons.destroy');
});


// Include authentication routes from Breeze
require __DIR__ . '/auth.php';

