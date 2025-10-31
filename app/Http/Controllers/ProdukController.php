<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        //raw query
        // $produtcwithdbraw = DB::select('select * from produks');
        // dd($produtcwithdbraw);

        //query helper
        $products = DB::table('produks')->select()->get()->toArray();

        //orm
        // $products = Produk::all();
        // $products = Produk::with(['users','kategoris'])->get()->toArray();
        dd($products);
        return view('productPage',compact('products'));
    }
    public function tambah(Request $request)
    {
        $validated = $request->validate([

        ]);
        // DB::insert('INSERT INTO produks (nama,deskripsi,stok,harga,user_id,kategori_id )VALUES ("indomie","seleraku",10,3000,1,1)');
        return redirect()->back();
    }
}
