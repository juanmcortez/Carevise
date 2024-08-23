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

    // Users
    Route::controller(UserController::class)->name('users.')->group(
        function () {
            Route::get('/users/list', 'index')->name('list');
            Route::get('/users/{user}/profile', 'edit')->name('profile');
            Route::patch('/users/{user}/profile', 'update')->name('profile.update');
        }
    );
});
