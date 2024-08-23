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
            Route::get('/users', 'index')->name('list');
            Route::get('/users/create', 'create')->name('create');
            Route::post('/users/create', 'store')->name('store');
            Route::get('/users/{user}/profile', 'edit')->name('profile');
            Route::patch('/users/{user}/profile', 'update')->name('profile.update');
            Route::put('/users/password/update', 'passwordupdate')->name('profile.password.update');
            Route::delete('/users/remove', 'destroy')->name('profile.destroy');
        }
    );
});

Route::fallback(function () {
    // Default
    return response()->redirectTo(route('dashboard'));
});
