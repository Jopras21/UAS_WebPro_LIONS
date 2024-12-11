<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\OrganizationController; // Tambahkan import untuk OrganizationController
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/calendars', CalendarController::class);
Route::get('/calendars/edit/{id}', [CalendarController::class, 'edit'])->name('calendars.edit');
Route::put('/calendars/edit/{id}', [CalendarController::class, 'update'])->name('calendars.update');
Route::delete('/calendars/{id}', [CalendarController::class, 'destroy'])->name('calendars.destroy');

// gallery
Route::resource('gallery', GalleryController::class);
Route::post('/gallery/upload', [GalleryController::class, 'upload'])->name('gallery.upload');

// Tambahkan rute refresh captcha
Route::get('/refresh-captcha', function () {
    return response()->json(['captcha' => captcha_img()]);
})->name('refresh.captcha');

Route::get('/gallery', [GalleryController::class, 'user_index'])->name('gallery.user_index');
Route::get('/gallery/{category:slug}', [GalleryController::class, 'user_show'])->name('gallery.user_show');

require __DIR__.'/auth.php';
