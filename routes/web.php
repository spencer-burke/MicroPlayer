<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Resources\FilmController;
use App\Http\Controllers\Resources\ProfileController;
use App\Http\Controllers\UI\UserDashboard;
use App\Http\Controllers\UI\ProfileDashboard;
use App\Http\Controllers\UI\FilmViewer;
use App\Http\Controllers\UI\FilmBrowser;

Route::redirect('/', '/login');
Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/dashboard', UserDashboard::class)->name('dashboard.user');
Route::get('/dashboard/profile/{profile}', ProfileDashboard::class)->name('dashboard.profile');
Route::get('/browser/{profile}', FilmBrowser::class)->name('film.browser');
Route::get('/viewer/{profile}/film/{film}', FilmViewer::class)->name('film.viewer');
Route::resource('profiles', ProfileController::class);
Route::resource('films', FilmController::class);
