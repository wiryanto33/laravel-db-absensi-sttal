<?php

use App\Http\Controllers\PrajurirtController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.auth-login');
});



Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => 'home']);
    })->name('home');

    Route::resource('prajurits', PrajurirtController::class);

    Route::resource('users', UserController::class);
});
