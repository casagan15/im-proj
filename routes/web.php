<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController; // add this line

Route::get('/', function () {
    return view('welcome');
});

// Student CRUD routes
Route::resource('students', StudentController::class);