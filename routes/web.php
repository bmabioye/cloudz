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
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Api\SubscriptionPlanController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\ConsultingController;
use App\Http\Controllers\CareerApplicationController;


// Default Breeze Routes
Route::view('/', 'welcome')->name('welcome');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('/profile', 'profile')
    ->middleware('auth')
    ->name('profile');

Route::view('/thank-you', 'thank-you')
    ->middleware(['auth', 'verified'])
    ->name('thank-you');

Route::view('/checkout-failed', 'checkout-failed')
    ->middleware(['auth', 'verified'])
    ->name('checkout-failed');
    
Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
    
Route::get('/about', function () {
        return view('about');
    })->name('about');

Route::get('/privacy', function () {
        return view('privacy');
    })->name('privacy');

Route::get('/terms', function () {
        return view('terms');
    })->name('terms');

Route::get('/careers', function () {
        return view('careers');
    })->name('careers');

Route::post('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::post('/logout', Logout::class)->name('logout');

// CloudZone Custom Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/fastcert', [HomeController::class, 'fastcert'])->name('fastcert.landing');
Route::get('/fastcert/resources', [ResourceController::class, 'index'])->name('fastcert.resources');

// For resource details
Route::get('/fastcert/resources/{id}', [ResourceController::class, 'show'])->name('fastcert.show');


// For subscription page
Route::middleware(['auth'])->group(function () {
Route::get('/fastcert/subscription', [SubscriptionController::class, 'index'])->name('subscription.index');
Route::get('/fastcert/subscribe/{id}', [SubscriptionController::class, 'subscribe'])->name('subscription.subscribe');
Route::get('/fastcert/purchase/{id}/buy', [ResourceController::class, 'showPurchasePage'])->name('resources.buy');
Route::post('/fastcert/resources/{id}/purchase', [ResourceController::class, 'processPurchase'])->name('resources.processPurchase');
Route::post('/resources/{id}/cart', [ResourceController::class, 'addToCart'])->name('resources.addToCart');
Route::get('/cart', [ResourceController::class, 'viewCart'])->name('cart.index');
Route::post('/cart/remove/{id}', [ResourceController::class, 'removeFromCart'])->name('cart.remove');
});
Route::get('/api/cart-count', [ResourceController::class, 'getCartCount']);


Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
});

// Route::post('webhook/stripe', [WebhookController::class, 'handleStripe']);
// Route::post('webhook/paystack', [WebhookController::class, 'handlePaystack']);


Route::post('/careers/apply', [CareerApplicationController::class, 'store'])->name('careers.apply');


Route::middleware('auth')->group(function () {
    Route::get('/purchases', [PurchaseController::class, 'list']); // List all purchases
    Route::get('/purchases/{id}', [PurchaseController::class, 'show']); // Show specific purchase
});

Route::middleware('auth')->group(function () {
    Route::get('/purchased-resources', [ResourceController::class, 'getPurchasedResources']);
    Route::get('/active-subscription', [SubscriptionController::class, 'getActiveSubscription']);
    Route::put('/profile', [UserController::class, 'updateProfile']);
});

// Consulting section
Route::get('/consulting', [ConsultingController::class, 'index'])->name('consulting.index');



Route::get('/mentorship/booking', [MentorshipController::class, 'showBookingForm'])->name('mentorship.booking');
Route::post('/mentorship/booking', [MentorshipController::class, 'storeBooking'])->name('mentorship.booking.store');
Route::get('/mentorship', [MentorshipController::class, 'landing'])->name('mentorship.landing');
Route::get('/mentorship/{id}/book', [BookingController::class, 'book'])->name('mentorship.book');
Route::post('/mentorship', [BookingController::class, 'store']); // Create booking

Route::prefix('services')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/cloud-solutions', [ServiceController::class, 'cloudSolutions'])->name('services.cloud-solutions');
    Route::get('/cybersecurity', [ServiceController::class, 'cybersecurity'])->name('services.cybersecurity');
    Route::get('/grc', [ServiceController::class, 'grc'])->name('services.grc');
    Route::get('/modernization', [ServiceController::class, 'modernization'])->name('services.modernization');
    Route::get('/digital-transformation', [ServiceController::class, 'digitization'])->name('services.digital-transformation');
    Route::get('/industry-solutions', [ServiceController::class, 'industrysolutions'])->name('services.industry-solutions');
    Route::get('/managed-services', [ServiceController::class, 'managedservices'])->name('services.mnaaged-services');
    Route::get('/ai-analytics', [ServiceController::class, 'analytics'])->name('services.ai-analytics');
    Route::get('/staffing', [ServiceController::class, 'staffing'])->name('services.staffing');
    Route::get('/training-certifications', [ServiceController::class, 'training'])->name('services.training-certifications');
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
    Route::put('/plans/{plan}/enable', [AdminPlanController::class, 'enable'])->name('plans.enable');
    Route::patch('/admin/plans/{plan}/toggle-status', [AdminPlanController::class, 'toggleStatus'])->name('plans.toggleStatus');


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
    Route::patch('/resources/{id}/activate', [AdminResourceController::class, 'activate'])->name('resources.activate');
    Route::patch('/resources/{id}/deactivate', [AdminResourceController::class, 'deactivate'])->name('resources.deactivate');



    // Admin CRUD Routes for Coupons
    // Route::get('/coupons', [AdminCouponController::class, 'index'])->name('coupons.index');
    Route::get('/coupons/create', [AdminCouponController::class, 'create'])->name('coupons.create');
    Route::post('/coupons', [AdminCouponController::class, 'store'])->name('coupons.store');
    Route::get('/coupons/{coupon}/edit', [AdminCouponController::class, 'edit'])->name('coupons.edit');
    Route::put('/coupons/{coupon}', [AdminCouponController::class, 'update'])->name('coupons.update');
    Route::delete('/coupons/{coupon}', [AdminCouponController::class, 'destroy'])->name('coupons.destroy');
});

Route::get('/invoice/{id}/download', [InvoiceController::class, 'download']);

// Include authentication routes from Breeze
require __DIR__ . '/auth.php';

