<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PackageBankController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PackageBookingController;
use App\Http\Controllers\PackageTourController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TourInclusionController;
use App\Http\Controllers\TourPlanController;
use Illuminate\Support\Facades\Route;

// Frontend routes
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/about-us', [FrontController::class, 'about_us'])->name('front.about-us');
Route::get('/contact-us', [FrontController::class, 'contact_us'])->name('front.contact-us');
Route::get('/travel', [FrontController::class, 'travel'])->name('front.travel');
Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');
Route::get('/detail/{packageTour:slug}', [FrontController::class, 'details'])->name('front.details');


// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated user routes
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Booking routes (with permission)
    Route::middleware('can:checkout package')->group(function () {
        Route::get('/book/{packageTour:slug}', [FrontController::class, 'book'])->name('front.book');
        Route::post('/book/save/{packageTour:slug}', [FrontController::class, 'book_store'])->name('front.book_store');

        Route::get('/book/choose-bank/{packageBooking}/', [FrontController::class, 'choose_bank'])->name('front.choose_bank');
        Route::patch('/book/choose-bank/{packageBooking}/save', [FrontController::class, 'choose_bank_store'])->name('front.choose_bank_store');

        Route::get('/book/payment/{packageBooking}/', [FrontController::class, 'book_payment'])->name('front.book_payment');
        Route::patch('/book/payment/{packageBooking}/save', [FrontController::class, 'book_payment_store'])->name('front.book_payment_store');

        Route::get('/book/finish/{packageBooking}/', [FrontController::class, 'checkout_success'])->name('front.checkout_success');
        Route::get('/book-finish', [FrontController::class, 'book_finish'])->name('front.book_finish');

        Route::post('/package-tours/{id}/reviews', [ReviewController::class, 'store'])->name('package_tours.reviews.store');
        Route::post('/contact-us/send', [FrontController::class, 'send'])->name('contact.send');
    });

    // Dashboard-specific routes
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::middleware('can:view orders')->group(function () {
            Route::get('/my-bookings', [DashboardController::class, 'my_bookings'])->name('bookings');
            Route::get('/my-bookings/details/{packageBooking}', [DashboardController::class, 'booking_details'])->name('booking_details');
        });
    });

    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::middleware('can:manage categories')->group(function () {
            Route::resource('categories', CategoryController::class);
        });

        Route::middleware('can:manage inclusions')->group(function () {
            Route::resource('tour_inclusions', TourInclusionController::class);
        });

        Route::middleware('can:manage plans')->group(function () {
            Route::resource('tour_plans', TourPlanController::class);
        });

        Route::middleware('can:manage package tours')->group(function () {
            Route::resource('package_tours', PackageTourController::class);
           
        });

        Route::middleware('can:manage package banks')->group(function () {
            Route::resource('package_banks', PackageBankController::class);
        });

        Route::middleware('can:manage transactions')->group(function () {
            Route::resource('package_bookings', PackageBookingController::class);
        });
    });
});

// Authentication routes
require __DIR__ . '/auth.php';
