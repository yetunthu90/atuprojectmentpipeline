<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/aboutus', function () {
    return view('aboutus');
})->name('about');
Route::get('/contactus', function () {
    return view('contact');
})->name('contact');
Route::post('/form-submit', [MessageController::class, 'store'])->name('form.submit');
Route::get('/level_one', function () {
    return view('level_one');
})->name('level_one');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/join_now', function () {
    return view('join_now');
})->name('join_now');


