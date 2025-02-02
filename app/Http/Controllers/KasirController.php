<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;

class KasirController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::get();
        $produks = Produk::get();

        return view('kasir', [
            'aktivitas' => 'kasir',
            'pelanggans' => $pelanggans,
            'produks' => $produks,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'total_harga' => 'required',
            'total_bayar' => 'required',
            'kembalian' => 'required',
            'tanggal_penjualan' => 'required',
            'detail_penjualans' => 'required',
        ]);

        $penjualan = Penjualan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'total_harga' => $request->total_harga,
            'total_bayar' => $request->total_bayar,
            'kembalian' => $request->kembalian,
            'tanggal_penjualan' => $request->tanggal_penjualan,
        ]);

        foreach ($request->detail_penjualans as $detail_penjualan) {
            DetailPenjualan::create([
                'id_penjualan' => $penjualan->id_penjualan,
                'id_produk' => $detail_penjualan['id_produk'],
                'jumlah' => $detail_penjualan['jumlah'],
                'total_harga' => $detail_penjualan['total_harga'],
            ]);
        }

        return response()->json([
            'message' => 'Penjualan berhasil disimpan'
        ]);
    }
}
