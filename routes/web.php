<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\ProviderController;
use App\Http\Controllers\Commons\DashboardController;

// Protected routes by login
Route::middleware('auth')->group(function () {
    // Landing
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'show')->name('dashboard');
    });

    // Providers
    Route::controller(ProviderController::class)->name('providers.')->group(
        function () {
            Route::get('/providers/disabled', 'disabled')->name('disabled.list');
            Route::get('/providers', 'index')->name('list');
            Route::get('/providers/create', 'create')->name('create');
            Route::post('/providers/create', 'store')->name('store');
            Route::get('/providers/{provider}/profile', 'edit')->name('profile');
            Route::patch('/providers/{provider}/profile', 'update')->name('profile.update');
            Route::put('/providers/password/update', 'passwordupdate')->name('profile.password.update');
            Route::delete('/providers/{provider}/remove', 'destroy')->name('profile.destroy');
        }
    );

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
