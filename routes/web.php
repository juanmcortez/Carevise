<?php

use Illuminate\Support\Facades\Route;

// Protected routes by login
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.index');
    })->name('index');
});
