<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'Nama',
        'Deskripsi',
    ];

    public function produks() //Kategori memiliki banyak produk
    {
        return $this->hasMany('Produk');
    }
}
