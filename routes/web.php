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

Route::get('/', function() {
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// prototype routes
Route::middleware('auth')->prefix('intellisched')->group(function() {
    // Route::get('login', function() {
    //     return view('auth.login');
    // })->name('login');
    // Route::get('register', function() {
    //     return view('auth.register');
    // })->name('register');
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('manage-classes', function () {
        return view('manage-classes');
    })->name('manage-classes');
    Route::get('manage-rooms', function () {
        return view('manage-rooms');
    })->name('manage-rooms');
    Route::get('manage-faculty', function () {
        return view('manage-faculty');
    })->name('manage-faculty');
    Route::get('manage-admin', function () {
        return view('manage-admin');
    })->name('manage-admin');
    Route::get('schedule', function () {
        return view('schedule');
    })->name('schedule');
});

require __DIR__.'/auth.php';
