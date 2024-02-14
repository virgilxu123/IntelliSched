<?php

use App\Http\Controllers\AcademicYearTermController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassScheduleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Models\AcademicYearTerm;

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
    Route::get('manage-subjects', [SubjectController::class, 'index'])->name('manage-subjects');
    Route::get('show-subject/{subject}', [SubjectController::class, 'show'])->name('show-subject');
    Route::post('add-subject', [SubjectController::class, 'store'])->name('add-subject');
    Route::post('update-subject/{subject}', [SubjectController::class, 'update'])->name('update-subject');
    Route::post('delete-subject/{subject}', [SubjectController::class, 'destroy'])->name('delete-subject');

    Route::get('manage-rooms', [ClassroomController::class, 'index'])->name('manage-rooms');
    Route::post('add-room', [ClassroomController::class, 'store'])->name('add-room');

    Route::get('manage-faculty', [FacultyController::class, 'index'])->name('manage-faculty');
    Route::post('add-faculty', [FacultyController::class, 'store'])->name('add-faculty');
    Route::get('show-faculty/{faculty}', [FacultyController::class, 'show'])->name('show-faculty');
    Route::post('update-faculty/{faculty}', [FacultyController::class, 'update'])->name('update-faculty');
    Route::post('delete-faculty/{faculty}', [FacultyController::class, 'destroy'])->name('delete-faculty');

    Route::get('manage-admin', function () {
        return view('manage-admin');
    })->name('manage-admin');
        
    Route::get('schedule', [AcademicYearTermController::class, 'index'])->name('schedule');
    Route::post('create-academic-year-term', [AcademicYearTermController::class, 'store'])->name('create-academic-year-term');
    Route::get('create-schedule/{academic_year_term}', [AcademicYearTermController::class, 'show'])->name('create-schedule');
});


require __DIR__.'/auth.php';
