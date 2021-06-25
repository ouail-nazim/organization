<?php

use App\Models\Member;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function () {
    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);

    Route::name('admin.')->middleware('auth')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        // setting
        Route::get('/setting', [App\Http\Controllers\HomeController::class, 'setting'])->name('setting');
        Route::put('/setting/{id}', [App\Http\Controllers\HomeController::class, 'editSetting'])->name('setting.edit');
        Route::put('/logo_cover', [App\Http\Controllers\HomeController::class, 'logoCover'])->name('update.logo_cover');
        // goals routes
        Route::get('/goals', [App\Http\Controllers\admin\GoalsController::class, 'index'])->name('goals.list');
        Route::get('/addGoal', [App\Http\Controllers\admin\GoalsController::class, 'create'])->name('add.goal');
        Route::post('/addGoal', [App\Http\Controllers\admin\GoalsController::class, 'store'])->name('add.goal');
        Route::put('/editGoal', [App\Http\Controllers\admin\GoalsController::class, 'edit'])->name('goal.edit');
        Route::delete('/deleteGoal/{goal:id}', [App\Http\Controllers\admin\GoalsController::class, 'destroy'])->name('goal.destroy');
        // grade routes
        Route::get('/grades', [App\Http\Controllers\admin\GradesController::class, 'index'])->name('grades.list');
        Route::get('/addGrade', [App\Http\Controllers\admin\GradesController::class, 'create'])->name('add.grade');
        Route::post('/addGrade', [App\Http\Controllers\admin\GradesController::class, 'store'])->name('add.grade');
        Route::delete('/deleteGrade/{grade:id}', [App\Http\Controllers\admin\GradesController::class, 'destroy'])->name('grade.destroy');
        // member routes
        Route::get('/members', [App\Http\Controllers\admin\MembersController::class, 'index'])->name('members.list');
        Route::get('/addMember', [App\Http\Controllers\admin\MembersController::class, 'create'])->name('add.member');
        Route::post('/addMember', [App\Http\Controllers\admin\MembersController::class, 'store'])->name('add.member');
        Route::get('/editMember/{member:id}', [App\Http\Controllers\admin\MembersController::class, 'edit'])->name('member.edit');
        Route::put('/editMember/{member:id}', [App\Http\Controllers\admin\MembersController::class, 'update'])->name('member.edit');
        Route::delete('/deleteMember/{member:id}', [App\Http\Controllers\admin\MembersController::class, 'destroy'])->name('member.destroy');
        // news routes
        Route::get('/news', [App\Http\Controllers\admin\NewsController::class, 'index'])->name('news.list');
        Route::get('/addNews', [App\Http\Controllers\admin\NewsController::class, 'create'])->name('add.news');
        Route::post('/addNews', [App\Http\Controllers\admin\NewsController::class, 'store'])->name('add.news');
        Route::get('/editNews/{news:id}', [App\Http\Controllers\admin\NewsController::class, 'edit'])->name('news.edit');
        Route::put('/editNews/{news:id}', [App\Http\Controllers\admin\NewsController::class, 'update'])->name('news.edit');
        Route::delete('/deleteNews/{news:id}', [App\Http\Controllers\admin\NewsController::class, 'destroy'])->name('news.destroy');
        // meetings routes
        Route::get('/meetings', [App\Http\Controllers\admin\MeetingsController::class, 'index'])->name('meetings.list');
        Route::get('/addMeeting', [App\Http\Controllers\admin\MeetingsController::class, 'create'])->name('add.meetings');
        Route::post('/addMeeting', [App\Http\Controllers\admin\MeetingsController::class, 'store'])->name('add.meetings');
        Route::get('/editMeeting/{meeting:id}', [App\Http\Controllers\admin\MeetingsController::class, 'edit'])->name('meeting.edit');
        Route::put('/editMeeting/{meeting:id}', [App\Http\Controllers\admin\MeetingsController::class, 'update'])->name('meeting.edit');
        Route::delete('/deleteMeeting/{meeting:id}', [App\Http\Controllers\admin\MeetingsController::class, 'destroy'])->name('meeting.destroy');
    });
});

Route::redirect('/home', '/admin/home', 301);

Route::get('/', [App\Http\Controllers\guest\HomeController::class, 'index'])->name('home');
Route::get('/news', [App\Http\Controllers\guest\HomeController::class, 'news'])->name('news');
Route::get('/goals', [App\Http\Controllers\guest\HomeController::class, 'goals'])->name('goals');
Route::get('/meetings', [App\Http\Controllers\guest\HomeController::class, 'meetings'])->name('meetings');
Route::get('/members', [App\Http\Controllers\guest\HomeController::class, 'members'])->name('members');
Route::get('/contact_us', [App\Http\Controllers\guest\HomeController::class, 'contactUs'])->name('contact_us');
