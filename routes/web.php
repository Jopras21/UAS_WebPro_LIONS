<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\GalleryController;
use app\Models\Calendar;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('calendars', CalendarController::class);

// gallery
Route::resource('gallery', GalleryController::class);
Route::post('/gallery/upload', [GalleryController::class, 'upload'])->name('gallery.upload');