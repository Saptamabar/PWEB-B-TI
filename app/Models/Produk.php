<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [ //data yang bisa di isi dari aplikasi
        'Nama',
        'Deskripsi',
        'Stok',
        'Harga',
        'kategori_id',
        'user_id'
    ];

    public function kategoris() //produk dimiliki banyak kategori
    {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
