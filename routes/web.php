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
        Route::get('/setting', [App\Http\Controllers\HomeController::class, 'setting'])->name('setting');
        Route::put('/setting/{id}', [App\Http\Controllers\HomeController::class, 'editSetting'])->name('setting.edit');
        Route::put('/logo_cover', [App\Http\Controllers\HomeController::class, 'logoCover'])->name('update.logo_cover');
    });
});

Route::redirect('/home', '/admin/home', 301);

Route::get('/', [App\Http\Controllers\guest\HomeController::class, 'index'])->name('home');
Route::get('/news', [App\Http\Controllers\guest\HomeController::class, 'news'])->name('news');
Route::get('/goals', [App\Http\Controllers\guest\HomeController::class, 'goals'])->name('goals');
Route::get('/meetings', [App\Http\Controllers\guest\HomeController::class, 'meetings'])->name('meetings');
Route::get('/members', [App\Http\Controllers\guest\HomeController::class, 'members'])->name('members');
Route::get('/contact_us', [App\Http\Controllers\guest\HomeController::class, 'contactUs'])->name('contact_us');
