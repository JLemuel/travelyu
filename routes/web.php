<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Models\Destination;
use App\Models\Activity;
use App\Models\Package;

// In routes/web.php
Route::post('/checkout', [BookingController::class, 'store'])->name('checkout');

// Place this inside web.php
Route::get('/booking-success', function () {
    return view('booking.success'); // Assumes you have a view named 'booking.success.blade.php'
})->name('booking.success');

Route::get('/admin/login', function () {
    return redirect()->to('login');
})->name('filament.admin.auth.login');

Route::get('/', function () {
    return view('splash');
});

// Assuming you already have this controller or you'll create it
Route::get('/destinations/{destinations}', [DestinationController::class, 'showDestinations'])->name('destinations.show');
Route::get('/destinations/{destinations}/{destinationId}', [DestinationController::class, 'show'])->name('destinations.detail');

Route::get('/packages/{package}', [PackageController::class, 'show'])->name('packages.show');
Route::get('/packages/details/{id}',  [PackageController::class, 'showDetail'])->name('packages.details');

// Route to handle review submission
Route::post('/submit-review', [ReviewController::class, 'store'])->name('review.store');

Route::get('/search-packages', [PackageController::class, 'search'])->name('search.packages');

Route::get('/search', function (Request $request) {
    $query = $request->query('query');

    // Execute search, e.g., based on a 'name' field. Adjust as needed.
    $destinations = Destination::where('name', 'LIKE', "%{$query}%")->get();

    // Use the 'top-cards' component view for displaying results.
    return view('search-results', ['destinations' => $destinations]);
})->name('search');


Route::get('/home', function () {
    $destinations = Destination::limit(3)->get(); // Fetch top 3 destinations from the database
    $activities = Activity::limit(3)->get(); // Fetch top 3 destinations from the database
    return view('welcome', compact('destinations', 'activities')); // Pass destinations to the welcome view
})->name('home');

// Destination page
Route::get('/destination', function () {
    $destinations = Destination::all(); // Fetch all destinations from the database
    return view('destination', compact('destinations')); // Assuming you have a view named 'destination.blade.php'
})->name('destination');

// Tour Packages page
Route::get('/tour-packages', function () {
    $packages = Package::all();
    return view('tour-packages', compact('packages')); // Assuming you have a view named 'tour-packages.blade.php'
})->name('tour-packages');

// About page
// It seems you've listed "about.html" twice in your navigation. Adjust as necessary.
Route::get('/about', function () {
    return view('about'); // Assuming you have a view named 'about.blade.php'
})->name('about');

// Contact page
Route::get('/contact', function () {
    return view('contact'); // Assuming you have a view named 'contact.blade.php'
})->name('contact');

// Dashboard route (protected by 'auth' middleware and verified email)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (protected by 'auth' middleware)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::post('register', [RegisteredUserController::class, 'store']);

// // Custom routes for your application
// Route::view('/destinations', 'destinations')->name('destinations'); // Assuming you have a view named 'destinations.blade.php'
// Route::view('/tour-packages', 'tour-packages')->name('tour-packages'); // Assuming you have a view named 'tour-packages.blade.php'
// Route::view('/about-us', 'about-us')->name('about-us'); // Assuming you have a view named 'about-us.blade.php'
// Route::view('/contact-us', 'contact-us')->name('contact-us'); // Assuming you have a view named 'contact-us.blade.php'

// Authentication routes (provided by Laravel Breeze)
require __DIR__ . '/auth.php';
