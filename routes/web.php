<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);

    Route::get('/', function () {
        return redirect()->route('login');
    });
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');

    Route::get('/products', [ProdukController::class, 'index'])->name('product.index');
    Route::get('/products/tambah', [ProdukController::class, 'tambahview'])->name('product.tambahview');

    Route::get('/products/{produk}/edit', [ProdukController::class, 'edit'])->name('product.edit');

    Route::put('/products/{produk}', [ProdukController::class, 'update'])->name('product.update');
    Route::delete('/products/{produk}', [ProdukController::class, 'destroy'])->name('product.destroy');

    Route::post('/products', [ProdukController::class, 'tambah'])->name('product.tambah');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
