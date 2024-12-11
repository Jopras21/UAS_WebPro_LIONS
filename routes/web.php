<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\OrganizationController; // Tambahkan import untuk OrganizationController
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MatchController;
use Illuminate\Foundation\Inspiring;
use App\Models\Contact;

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


//gallery
Route::get('/', function () {
    return view('pages.home', [
        'title' => 'Home'
    ]);
})->name('home');

Route::get('/about', function () {
    return view('pages.about', [
        'title' => 'About'
    ]);
})->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/contact/form', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/form', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

Route::get('/gallery', [GalleryController::class, 'user_index'])->name('gallery.user_index');
Route::get('/gallery/{category:slug}', [GalleryController::class, 'user_show'])->name('gallery.user_show');

Route::middleware(['admin', 'auth'])->group(function () {
    Route::get('dashboard/account', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('dashboard/account/{id}', [ProfileController::class, 'edit_admin'])->name('profile.edit_admin');
    Route::put('dashboard/account/{id}', [ProfileController::class, 'update_admin'])->name('profile.update_admin');
    Route::delete('dashboard/account/{id}', [ProfileController::class, 'destroy_admin'])->name('profile.destroy_admin');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'quote' => Inspiring::quote(),
            'pengajuans' => Contact::limit(10)->orderByDesc('id')->get(),
            'pendings' => Contact::where('status', 'Pending')->get(),
            'notification' => Contact::where('status', 'Pending')->get(),
        ]);
    })->name('dashboard');

    Route::get('/dashboard/services', [ContactController::class, 'show'])->name('contact.show');
    Route::get('/dashboard/services/{id}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/dashboard/services/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('/dashboard/services/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

    Route::resource('/dashboard/category', CategoryController::class);

    Route::resource('/dashboard/gallery', GalleryController::class);
    Route::post('/dashboard/gallery/upload', [GalleryController::class, 'upload'])->name('gallery.upload');
    Route::get('/matches', [MatchController::class, 'showMatches'])->name('matches.show');
});

require __DIR__ . '/auth.php';


require __DIR__.'/auth.php';
