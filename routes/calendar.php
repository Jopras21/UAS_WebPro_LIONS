<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

Route::get('/', function () {
    return view('welcome');
});

