<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterPembeliController;
use App\Http\Controllers\Auth\RegisterPenjualController;
use App\Http\Controllers\PenjualController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register-pembeli', [RegisterPembeliController::class, 'create'])
    ->name('register.pembeli');

Route::post('/register-pembeli', [RegisterPembeliController::class, 'store'])
    ->name('register.pembeli.store');

Route::get('/login', [LoginController::class, 'create'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/register-penjual', [RegisterPenjualController::class, 'create'])
    ->name('register.penjual');

Route::post('/register-penjual', [RegisterPenjualController::class, 'store'])
    ->name('register.penjual.store');

Route::get('/penjual/dashboard', [PenjualController::class, 'dashboard'])
    ->name('penjual.dashboard');

Route::get('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'loginProcess'])
    ->name('admin.login.process');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');

Route::post('/admin/seller/{user}/approve', [AdminController::class, 'approveSeller'])
    ->name('admin.seller.approve');

Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])
    ->name('google.redirect');

Route::get('/auth/google/callback', [GoogleController::class, 'callback'])
    ->name('google.callback');
