@extends('bagian.main')

@section('content')
    <x-dynamic-content>
        <!-- CSS DataTables -->



        <h1 class="h3 mb-0 text-gray-800">Halaman Data Produk</h1>
        <p class="mb-4">
            Tabel data produk yang sudah terdaftar
        </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <h6 class="m-0 font-weight-bold text-primary col-6">Data Produk</h6>
                    <span class="col-6 text-right">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                            data-target="#tambah"><i class="fas fa-plus fa-sm text-white-50"></i>
                            Tambah Data</a>
                    </span>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar Produk</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($produks as $key => $produk)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="gambar/{{ $produk->GambarProduk }}" class="rounded" style="width: 100px">
                                    </td>
                                    <td>{{ $produk->KodeProduk }}</td>
                                    <td>{{ $produk->NamaProduk }}</td>
                                    <td> {{ formatRupiah($produk->Harga) }}</td>
                                    <td>{{ $produk->Stok }}</td>
                                    <td>
                                        <a href="#" id="tomboledit" class="btn btn-sm btn-primary edit-btn"
                                            data-toggle="modal" data-target="#edit" 
                                            data-id="{{ $produk->id }}"
                                            data-kode="{{ $produk->KodeProduk }}"
                                            data-nama="{{ $produk->NamaProduk }}"
                                            data-harga="{{ $produk->Harga }}"
                                            data-stok="{{ $produk->Stok }}"
                                            data-gambar="gambar/{{ $produk->GambarProduk }}"
                                            >


                                            Edit
                                        </a>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#hapus{{ $produk->id }}">
                                            <i class="bi bi-trash-fill"></i> Hapus
                                        </button>

                                        {{-- modal untuk delete --}}
                                        <!-- Logout Modal-->
                                        <div class="modal fade" id="hapus{{ $produk->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ route('produk.hapus', ['id' => $produk->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title text-white" id="exampleModalLabel">Hapus
                                                                Data?
                                                            </h5>
                                                            <button class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <img src="gambar/{{ $produk->GambarProduk }}" class="rounded" style="width: 100px">
                                                                </div>
                                                                <div class="col-8">
                                                                    Apakah Anda Yakin Hapus Data <br>
                                                            <b>{{ $produk->NamaProduk }}</b>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>


        <!-- Modal Tambah -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user" action="{{ route('produk.tambah') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="kode_produk">Kode Produk</label>
                                <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="nama_pelanggan">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Produk</label>
                                <input type="number" name="harga" class="form-control" placeholder="Harga Produk"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok Produk</label>
                                <input type="number" name="stok" class="form-control" placeholder="Stok Produk"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="stok">Gambar Produk</label>
                                <input type="file" name="gambar" class="form-control" placeholder="Gambar" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambah Produk</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Ubah Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user" action="{{ route('produk.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="kode_produk">Kode Produk</label>
                                <input type="text" name="kode_produk" id="kode_produk" class="form-control" placeholder="Kode Produk"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="nama_pelanggan">Nama Produk</label>
                                <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="Nama Produk"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Produk</label>
                                <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga Produk"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok Produk</label>
                                <input type="number" name="stok" id="stok" class="form-control" placeholder="Stok Produk"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="stok">Gambar Produk</label><br>
                                <img src="" id="gambar" class="rounded" style="width: 100px">
                                <input type="file" name="gambar" class="form-control" placeholder="Gambar">
                                <span class="text-danger text-small" style="font-size: 12px;">Kosongkan jika gambar tidak diubah</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Ubah Produk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.edit-btn').on('click', function() {

                    var id = $(this).data('id');
                    var kode_produk = $(this).data('kode');
                    var nama_produk = $(this).data('nama');
                    var harga = $(this).data('harga');
                    var stok = $(this).data('stok');
                    var gambar = $(this).data('gambar');

                    $('#id').val(id);
                    $('#kode_produk').val(kode_produk);
                    $('#nama_produk').val(nama_produk);
                    $('#harga').val(harga);
                    $('#stok').val(stok);
                    document.getElementById('gambar').src = gambar;
                });
            });
        </script>

    </x-dynamic-content>
@endsection
