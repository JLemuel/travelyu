<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Home page route
Route::get('/', function () {
    return view('welcome'); // Assuming 'welcome' is your homepage view.
})->name('home');

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

// Custom routes for your application
Route::view('/destinations', 'destinations')->name('destinations'); // Assuming you have a view named 'destinations.blade.php'
Route::view('/tour-packages', 'tour-packages')->name('tour-packages'); // Assuming you have a view named 'tour-packages.blade.php'
Route::view('/about-us', 'about-us')->name('about-us'); // Assuming you have a view named 'about-us.blade.php'
Route::view('/contact-us', 'contact-us')->name('contact-us'); // Assuming you have a view named 'contact-us.blade.php'

// Authentication routes (provided by Laravel Breeze)
require __DIR__.'/auth.php';
