<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class produkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create([
            'Nama' => 'Lemari',
            'Deskripsi' => "lemari untuk menyimpan pakaian",
            'Stok' => 10,
            'Harga' => 1000000,
            'kategori_id' => 1,
            'user_id' => 1
        ]);
    }
}
