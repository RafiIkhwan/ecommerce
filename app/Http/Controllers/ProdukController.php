<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('tambahproduk',[
            'kategori' => Kategori::all(),
        ]);
    }

    public function store(Request $request)
    {

        $file   = $request->file('gambar');
        $path   = $file->store('public');

        Produk::create([
            'nama_produk' => $request->nm_produk, 
            'id_kategori' => $request->kategori, 
            'deskripsi' => $request->deskripsi, 
            'harga' => $request->harga, 
            'gambar' => str_replace('public/', '',$path), 
        ]);

        return redirect('admin')->with('success', 'Produk berhasil ditambah');
    }
    public function edit($id)
    {
        return view('editproduk',[
            'produk' => Produk::where('id_produk', $id)->get()->first(),
            'kategori' => Kategori::all(),
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $produkOld = Produk::find($id);

        $file   = $request->file('gambar');
        if(!$file){ 

            $produkOld->nama_produk = $request->nm_produk;
            $produkOld->id_kategori = $request->kategori;
            $produkOld->deskripsi = $request->deskripsi;
            $produkOld->harga = $request->harga;
    
            $produkOld->save();
        }else{
            
        $path   = $file->store('public');

        $produkOld->nama_produk = $request->nm_produk;
        $produkOld->id_kategori = $request->kategori;
        $produkOld->deskripsi = $request->deskripsi;
        $produkOld->harga = $request->harga;
        $produkOld->gambar = str_replace('public/', '',$path);

        $produkOld->save();
        }

        return redirect('admin')->with('success', 'Produk berhasil diedit');
    }

    public function hapus($id) {
        $produk = Produk::find($id);
        $produk->delete();

        return redirect('admin')->with('success', 'Produk berhasil dihapus!');
    }
}
