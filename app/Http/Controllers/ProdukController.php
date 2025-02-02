<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->paginate(10);

        return view('index', [
            'aktivitas' => 'produk',
            'produks' => $produks
        ]);
    }

    public function upload(request $request) {
        // dd($request);
        $request ->validate([
            'gambar'=> 'required|image|mimes:jpeg,jpg,png,JPG,JPEG,PNG|max:6048',
            'kode_produk'=>'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);
        //upload image
        if ($image = $request->file('gambar')) {
            $destinationPath = 'gambar/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Produk::create([
            'GambarProduk'     => $profileImage,
            'KodeProduk'=>$request->kode_produk,
            'NamaProduk' => $request->nama_produk,
            'Harga' => $request->harga,
           'Stok' => $request->stok
        ]);

        return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request) {
        $request ->validate([
            'gambar'=> 'nullable|image|mimes:jpeg,jpg,png,JPG,JPEG,PNG|max:6048',
            'id_produk' => 'required',
            'kode_produk'=>'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            
        ]);
        $id_produk = $request->id_produk;
        $produk = Produk::findOrFail($id_produk);
        
        dd($request);
        if($request->file('gambar') == "") {
            $produk->update([
                'KodeProduk' => $request->kode_produk,
                'NamaProduk' => $request->nama_produk,
                'Harga' => $request->harga,
                'Stok' => $request->stok
            ]);
        }
        else
        {
            $image = $request->file('gambar');

            $destinationPath = 'gambar/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";

            $produk->update([
                'KodeProduk' => $request->kode_produk,
                'NamaProduk' => $request->nama_produk,
                'Harga' => $request->harga,
                'Stok' => $request->stok,
                'GambarProduk' => $request->$profileImage,
            ]);

        }
        return redirect()->route('produk')->with('success', 'Produk berhasil diperbarui!');
    }

    public function delete($id_produk) {
        $produk = Produk::findOrFail($id_produk);

        $produk->delete();

        return redirect()->route('produk')->with('success', 'Produk berhasil dihapus!');
    }

    

}
