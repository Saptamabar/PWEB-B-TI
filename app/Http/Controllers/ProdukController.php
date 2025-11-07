<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $products = Produk::with(['users','kategoris'])->get();
        // dd($products);
        return view('productPage',compact('products'));
    }

    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'Nama'        => 'required|string|max:255',
            'Deskripsi'   => 'nullable|string',
            'Stok'        => 'required|integer|min:0',
            'Harga'       => 'required|numeric|min:0',
            'kategori_id' => 'required|integer|exists:kategoris,id',
        ]);

        $dataToCreate = array_merge(
            $validated,
            ['user_id' => Auth::id()]
        );

        Produk::create($dataToCreate);

        return redirect('/products')
               ->with('success', 'Produk baru berhasil ditambahkan!');
    }

    public function tambahview()
    {
        $kategoris = Kategori::all();

        return view('tambahproduct', [
            'kategoris' => $kategoris
        ]);
    }
    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();

        return view('editproduct', [
            'produk' => $produk,
            'kategoris' => $kategoris
        ]);
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'Nama'        => 'required|string|max:255',
            'Deskripsi'   => 'nullable|string',
            'Stok'        => 'required|integer|min:0',
            'Harga'       => 'required|numeric|min:0',
            'kategori_id' => 'required|integer|exists:kategoris,id',
        ]);

        $produk->update($validated);

        return redirect()->route('product.index')
               ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('product.index')
               ->with('success', 'Produk berhasil dihapus!');
    }
}
