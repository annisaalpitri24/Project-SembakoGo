
<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterPembeliController;
use App\Http\Controllers\Auth\RegisterPenjualController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// ==========================================
// LANDING PAGE
// ==========================================

Route::get('/', [LandingPageController::class, 'index'])
    ->name('home');

Route::get('/produk/{product}', [LandingPageController::class, 'show'])
    ->name('produk.detail');

// ==========================================
// AUTHENTICATION PEMBELI
// ==========================================

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

// ==========================================
// AUTHENTICATION PENJUAL
// ==========================================

Route::get('/register-penjual', [RegisterPenjualController::class, 'create'])
    ->name('register.penjual');

Route::post('/register-penjual', [RegisterPenjualController::class, 'store'])
    ->name('register.penjual.store');

Route::get('/penjual/dashboard', [PenjualController::class, 'dashboard'])
    ->name('penjual.dashboard');

// ==========================================
// AUTHENTICATION GOOGLE
// ==========================================

Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])
    ->name('google.redirect');

Route::get('/auth/google/callback', [GoogleController::class, 'callback'])
    ->name('google.callback');

// ==========================================
// ADMIN
// ==========================================

Route::get('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'loginProcess'])
    ->name('admin.login.process');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');

    Route::post('/seller/{user}/approve', [AdminController::class, 'approveSeller'])
        ->name('seller.approve');

    // Admin memiliki akses penuh untuk mengelola kategori
    Route::get('/kategori', [CategoryController::class, 'index'])
        ->name('kategori.index');

    Route::get('/kategori/tambah', [CategoryController::class, 'create'])
        ->name('kategori.create');

    Route::post('/kategori', [CategoryController::class, 'store'])
        ->name('kategori.store');

    Route::get('/kategori/{kategori}/edit', [CategoryController::class, 'edit'])
        ->name('kategori.edit');

    Route::put('/kategori/{kategori}', [CategoryController::class, 'update'])
        ->name('kategori.update');

    Route::delete('/kategori/{kategori}', [CategoryController::class, 'destroy'])
        ->name('kategori.destroy');
});

// ==========================================
// PENJUAL
// ==========================================

Route::middleware(['auth'])->prefix('penjual')->name('penjual.')->group(function () {

    // Penjual hanya dapat MELIHAT kategori
    Route::get('/kategori', [CategoryController::class, 'sellerIndex'])
        ->name('kategori.index');

    // Profil toko
    Route::get('/profil-toko', function () {
        $store = auth()->user()->store;

        abort_if(!$store, 403, 'Data toko tidak ditemukan.');

        return view('penjual.profil', compact('store'));
    })->name('profil');

    // Produk
    Route::get('/produk', [ProductController::class, 'index'])
        ->name('produk.index');

    Route::get('/produk/tambah', [ProductController::class, 'create'])
        ->name('produk.create');

    Route::post('/produk', [ProductController::class, 'store'])
        ->name('produk.store');

    Route::get('/produk/{product}/edit', [ProductController::class, 'edit'])
        ->name('produk.edit');

    Route::put('/produk/{product}', [ProductController::class, 'update'])
        ->name('produk.update');

    Route::delete('/produk/{product}', [ProductController::class, 'destroy'])
        ->name('produk.destroy');
});
