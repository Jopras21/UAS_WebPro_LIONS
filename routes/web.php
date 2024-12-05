<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use app\Models\Calendar;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('calendars', CalendarController::class);

