<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\user\UserDashController;
use App\Http\Controllers\moder\ModerDashController;
use App\Http\Controllers\admin\AdminDashController;
use App\Http\Controllers\ProfilePhotoController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::middleware(['auth.user'])->group(function () {
    Route::get('dashboard',[UserDashController::class,'index'])->name('dashboard');
    Route::post('/public/photo', [ProfilePhotoController::class, 'store'])->name('profile.photo.store');
});

Route::middleware(['auth.moder'])->group(function () {
    Route::get('moder/dashboard',[ModerDashController::class,'index'])->name('moder.dashboard');
    Route::post('/public/photo', [ProfilePhotoController::class, 'store'])->name('profile.photo.store');
});


Route::middleware(['auth.admin'])->group(function () {
    Route::get('admin/dashboard',[AdminDashController::class,'index'])->name('admin.dashboard');
    Route::post('/public/photo', [ProfilePhotoController::class, 'store'])->name('profile.photo.store');
    Route::get('profile/show', [ProfilePhotoController::class, 'show'])->name('profile.show');
});