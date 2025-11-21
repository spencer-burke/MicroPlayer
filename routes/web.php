<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Resources\ProfileController;
use App\Http\Controllers\UI\UserDashboard;
use App\Http\Controllers\UI\ProfileDashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/dashboard', UserDashboard::class)->name('dashboard.user');
Route::get('/dashboard/profile/{profile}', ProfileDashboard::class)->name('dashboard.profile');
