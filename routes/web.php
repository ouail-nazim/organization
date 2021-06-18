<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function () {
    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);

    Route::name('admin.')->middleware('auth')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });
});

Route::redirect('/home', '/admin/home', 301);

Route::get('/', [App\Http\Controllers\guest\HomeController::class, 'index'])->name('home');
