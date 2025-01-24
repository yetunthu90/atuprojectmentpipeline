<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\JoinnowController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\auth\PasswordResetMail;

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

//course management//
Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::post('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
Route::delete('/courses/listing', [CourseController::class, 'courselist']);

Route::get('/join_now', [JoinnowController::class, 'index'])->name('join_now');
//user management //
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('save-register', [AuthController::class, 'register'])->name('save.register');
Route::get('/register', [AuthController::class, 'index'])->name('registeration');
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::POST('/do-login', [AuthController::class, 'dologin'])->name('do.login');
Route::get('/auth/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
Route::POST('/do-forgot-password', [AuthController::class, 'doForgotPassword'])->name('do.forgot.password');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset.password');

//user management//
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

#payments
Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
Route::post('/payments/store', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('payments.show');
Route::get('/payments/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
Route::post('/payments/{id}', [PaymentController::class, 'update'])->name('payments.update');
Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');


