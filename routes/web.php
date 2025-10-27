<?php

use App\Models\Produk;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products',function(){
    $products = Produk::with(['users','kategoris'])->get()->toArray();
    return view('productPage',compact('products'));
})->name('product.index');
