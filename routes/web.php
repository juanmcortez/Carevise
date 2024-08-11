<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;

// Protected routes by login
Route::middleware('auth')->group(function () {
    // Landing
    Route::get('/', function () {
        return view('main.index');
    })->name('index');

    // User Profile
    Route::controller(UserController::class)->group(function () {
        Route::get('/{username}/profile', 'edit')->name('user.profile');
    });
});
