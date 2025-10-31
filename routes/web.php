<?php

use App\Http\Controllers\ProdukController;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'status' => '200',
        'message'=> 'ok',
        'data' => []
    ]);
});

Route::get('/products',[ProdukController::class,'index'])->name('product.index');
Route::post('/products',[ProdukController::class,'tambah'])->name('product.tambah');

Route::middleware('Auth:true')->group(function(){
    Route::get('dashboard',function(){
        return view('welcome');
    });
});

Route::get('login',function(){
    return view('login');
})->name('login');

