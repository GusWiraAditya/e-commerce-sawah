<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

// =========================================================================
// RUTE PENGGUNA BIASA (WAJIB LOGIN)
// =========================================================================
// Pastikan ada ->name('home') di akhir baris
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'publicIndex'])->name('products.public.index');
Route::get('/product/{product}', [ProductController::class, 'publicShow'])->name('products.public.show');

Route::middleware('auth')->group(function () {
    
    // Dashboard untuk pengguna biasa
    Route::get('/home', [HomeController::class, 'home'])->middleware(['verified'])->name('dashboard');

    // Rute untuk manajemen profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// =========================================================================
// RUTE KHUSUS ADMIN (WAJIB LOGIN & isAdmin true)
// =========================================================================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard khusus untuk admin
    // Anda bisa membuat controller baru atau mengarahkan ke view secara langsung
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['verified'])->name('dashboard');

    // Manajemen Produk (CRUD) - Sekarang aman dan hanya untuk admin
    Route::resource('products', ProductController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])
    ->names([
        'index' => 'products.index',
        'create' => 'products.create',
        'store' => 'products.store',
        'show' => 'products.show',
        'edit' => 'products.edit',
        'update' => 'products.update',
        'destroy' => 'products.destroy',
    ]);


    // Anda bisa menambahkan rute admin lainnya di sini (misal: manajemen user, pesanan, dll.)

});


// =========================================================================
// RUTE PUBLIK & AUTENTIKASI
// =========================================================================


// Rute untuk login, register, dll. dari Laravel Breeze
require __DIR__.'/auth.php';
