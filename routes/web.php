<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/aboutus', function () {
    return view('aboutus');
})->name('about');
Route::get('/contactus', function () {
    return view('contact');
})->name('contact');
Route::get('/level_one', function () {
    return view('level_one');
})->name('level_one');
Route::get('/dashboard_index', function () {
    return view('dashboard_index');
})->name('dashboard_index');


