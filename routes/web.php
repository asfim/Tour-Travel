<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Models\TourPackage;
use App\Models\Destination;
use App\Models\BlogPost;

/*
|--------------------------------------------------------------------------
| Web Routes - GoTravel Bangladesh
|--------------------------------------------------------------------------
*/

// Public Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/subscribe', [HomeController::class, 'subscribeNewsletter'])->name('subscribe');
Route::post('/custom-tour', [HomeController::class, 'requestCustomTour'])->name('custom-tour.request');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');

// Packages
Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
Route::get('/packages/{slug}', [PackageController::class, 'show'])->name('packages.show');

// Destinations
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{slug}', [DestinationController::class, 'show'])->name('destinations.show');

// Visa Services
Route::get('/visa-services', [VisaController::class, 'index'])->name('visa.index');
Route::get('/visa/{slug}', [VisaController::class, 'show'])->name('visa.show');
Route::post('/visa/apply', [VisaController::class, 'apply'])->name('visa.apply');

// Flight Services
Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');
Route::post('/flights/request', [FlightController::class, 'requestBooking'])->name('flights.request');

// Hotel Services
Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('/hotels/{slug}', [HotelController::class, 'show'])->name('hotels.show');

// General Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// Travel Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Booking Flow
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/confirmation/{booking_number}', [BookingController::class, 'confirmation'])->name('booking.confirmation');
Route::post('/booking/payment/{booking_number}', [BookingController::class, 'processPayment'])->name('booking.payment');
Route::get('/booking/invoice/{booking_number}', [BookingController::class, 'invoice'])->name('booking.invoice');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Customer Dashboard Routes (Authenticated)
Route::middleware(['auth'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [CustomerDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/bookings', [CustomerDashboardController::class, 'bookings'])->name('bookings');
    Route::get('/bookings/{id}', [CustomerDashboardController::class, 'bookingDetails'])->name('booking-details');
    Route::get('/payments', [CustomerDashboardController::class, 'payments'])->name('payments');
    Route::get('/invoices', [CustomerDashboardController::class, 'invoices'])->name('invoices');
    Route::get('/documents', [CustomerDashboardController::class, 'documents'])->name('documents');
    Route::get('/profile', [CustomerDashboardController::class, 'profile'])->name('profile');
    Route::post('/profile', [CustomerDashboardController::class, 'updateProfile'])->name('profile.update');
    Route::post('/password', [CustomerDashboardController::class, 'changePassword'])->name('password.change');
    Route::get('/support', [CustomerDashboardController::class, 'support'])->name('support');
});

// Admin Panel Routes (Admin Role Only)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Bookings
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings');
    Route::post('/bookings/{id}/update', [AdminController::class, 'updateBookingStatus'])->name('bookings.update');

    // Tour Packages
    Route::get('/packages', [AdminController::class, 'packages'])->name('packages');
    Route::get('/packages/create', [AdminController::class, 'createPackage'])->name('packages.create');
    Route::post('/packages/store', [AdminController::class, 'storePackage'])->name('packages.store');

    // Destinations
    Route::get('/destinations', [AdminController::class, 'destinations'])->name('destinations');

    // Visa
    Route::get('/visas', [AdminController::class, 'visas'])->name('visas');

    // Flights
    Route::get('/flights', [AdminController::class, 'flights'])->name('flights');

    // Hotels
    Route::get('/hotels', [AdminController::class, 'hotels'])->name('hotels');

    // Customers
    Route::get('/customers', [AdminController::class, 'customers'])->name('customers');

    // Coupons
    Route::get('/coupons', [AdminController::class, 'coupons'])->name('coupons');

    // Messages & Subscribers
    Route::get('/messages', [AdminController::class, 'messages'])->name('messages');
    Route::get('/subscribers', [AdminController::class, 'subscribers'])->name('subscribers');

    // Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});

// SEO Sitemap Generator Route
Route::get('/sitemap.xml', function () {
    $packages = TourPackage::all();
    $destinations = Destination::all();
    $blogs = BlogPost::all();

    $content = view('sitemap', compact('packages', 'destinations', 'blogs'));
    return response($content, 200)->header('Content-Type', 'text/xml');
});
