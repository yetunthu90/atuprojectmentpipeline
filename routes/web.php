<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\JoinnowController;

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

Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::post('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

Route::get('/join_now', [JoinnowController::class, 'index'])->name('join_now');


