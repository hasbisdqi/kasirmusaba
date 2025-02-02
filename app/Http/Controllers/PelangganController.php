<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::latest()->paginate(10);
        
        return view('index', [
            'aktivitas' => 'pelanggan',
            'pelanggans' => $pelanggans
        ]);
        
    }

    public function upload(request $request) {
        // dd($request);
        $request ->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ]);

        Pelanggan::create([
            'NamaPelanggan' => $request->nama_pelanggan,
            'Alamat' => $request->alamat,
            'NomorTelepon' => $request->nomor_telepon,
        ]);

        return redirect()->route('pelanggan')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    public function update(Request $request) {
        
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ]);

        $id_pelanggan = $request->id_pelanggan;

        $pelanggan = Pelanggan::findOrFail($id_pelanggan);

        $pelanggan->NamaPelanggan = $request->nama_pelanggan;
        $pelanggan->Alamat = $request->alamat;
        $pelanggan->NomorTelepon = $request->nomor_telepon;

        $pelanggan->save();

        return redirect()->route('pelanggan')->with('success', 'Pelanggan berhasil diubah!');
    }

    public function delete($id_pelanggan) {
        $pelanggan = pelanggan::findOrFail($id_pelanggan);

        $pelanggan->delete();

        return redirect()->route('pelanggan')->with('success', 'Produk berhasil dihapus!');
    }
}
