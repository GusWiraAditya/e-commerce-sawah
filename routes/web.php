<?php

use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserProductController;


require __DIR__ . '/auth.php';

Route::resource('products', AdminProductController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']) // ✅ tambahkan edit dan update
    ->names([
        'index' => 'products.index',
        'create' => 'products.create',
        'store' => 'products.store',
        'show' => 'products.show',
        'edit' => 'products.edit',    
        'update' => 'products.update',       
        'destroy' => 'products.destroy',
    ]);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

