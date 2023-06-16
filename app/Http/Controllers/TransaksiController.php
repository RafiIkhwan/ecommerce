<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index($idproduk)
    {
        return view('transaksi',[
            'id'    => $idproduk,
            'produk'=> Produk::where('id_produk', $idproduk)->get()->first(),
        ]);
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $code = 'INV' . '/' . Carbon::now()->format('Y') . '/' . Carbon::now()->format('m') . '/' . Carbon::now()->format('d') . "/" . $id  . rand(10,99);

        Transaksi::create([
            'id_customer'   => Auth::guard('customer')->user()->id_customer,
            'tanggal'       => Carbon::now(),
            'kode_transaksi'=> $code,
        ]);

        $Transaksi = Transaksi::where('kode_transaksi', $code)->first();
        
        TransaksiDetail::create([
            'id_produk' => $id,
            'jumlah' => $request->jml,
            'id_transaksi' => $Transaksi->id_transaksi,
        ]);

        return redirect('/')->with('success', 'Pesanan telah di proses');
    }
}
