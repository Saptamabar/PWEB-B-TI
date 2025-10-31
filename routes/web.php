<?php

use App\Http\Controllers\ProdukController;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products',[ProdukController::class,'index'])->name('product.index');
Route::post('/products',[ProdukController::class,'tambah'])->name('product.tambah');
