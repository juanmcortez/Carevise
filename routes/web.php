<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Commons\DashboardController;

// Protected routes by login
Route::middleware('auth')->group(function () {
    // Landing
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'show')->name('dashboard');
    });

    // User Profile
    Route::controller(UserController::class)->group(function () {
        Route::get('/{user:username}/profile', 'edit')->name('user.profile');
        Route::patch('/{user:username}/profile', 'update')->name('user.profile.update');
    });
});
