@extends('bagian.main')

@section('content')
    <x-dynamic-content>
        <!-- CSS DataTables -->


 
            <h1 class="h3 mb-0 text-gray-800">Halaman Data Pelanggan</h1>
            <p class="mb-4">
                Tabel data Pelanggan yang sudah terdaftar
            </p>
        
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary col-6">Data Pelanggan</h6>
                        <span class="col-6 text-right">
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                data-toggle="modal" data-target="#tambah"><i class="fas fa-plus fa-sm text-white-50"></i>
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
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telephone</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pelanggans as $key => $pelanggan)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $pelanggan->NamaPelanggan }}</td>
                                        <td>{{ $pelanggan->Alamat }}</td>
                                        <td>{{ $pelanggan->NomorTelepon }}</td>
                                        <td>
                                            <a href="#" id="tomboledit" class="btn btn-sm btn-primary edit-btn"
                                                data-toggle="modal" data-target="#edit"
                                                data-id="{{ $pelanggan->id }}"
                                                data-nama="{{ $pelanggan->NamaPelanggan }}"
                                                data-alamat="{{ $pelanggan->Alamat }}"
                                                data-nomor="{{ $pelanggan->NomorTelepon }}">
                                                Edit
                                            </a>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{$pelanggan->id}}">
                                                <i class="bi bi-trash-fill"></i> Hapus
                                            </button>

                                            {{-- modal untuk delete --}}
                                            
                                            <div class="modal fade" id="hapus{{$pelanggan->id}}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('pelanggan.hapus',['id'=>$pelanggan->id])}}" method="post">
                                                        @csrf
                                                         @method('DELETE')
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title text-white" id="exampleModalLabel">Hapus Data?
                                                            </h5>
                                                            <button class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Apakah Anda Yakin Hapus Data <b>{{$pelanggan->NamaPelanggan}}</b></div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger" >Hapus</button>
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
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user" action="{{ route('pelanggan.tambah') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                <input type="text" name="nama_pelanggan" class="form-control"
                                    placeholder="Nama Pelanggan" required>
                            </div>
                            <div class="form-group">
                                <label for="harga">Alamat Pelanggan</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="stok">No Telepon</label>
                                <input type="number" name="nomor_telepon" class="form-control" placeholder="Nomor Telepon"
                                    required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user" action="{{ route('pelanggan.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="hidden" name="id_pelanggan" id="id_pelanggan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control"
                                    placeholder="Nama Pelanggan" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Pelanggan</label>
                                <input type="text" name="alamat" id="alamat" class="form-control"
                                    placeholder="Alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="number" name="nomor_telepon" id="nomor" class="form-control"
                                    placeholder="Nomor Telepon" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Update Pelanggan</button>
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
                    var nama = $(this).data('nama');
                    var alamat = $(this).data('alamat');
                    var nomor = $(this).data('nomor');


                    $('#id_pelanggan').val(id);
                    $('#nama_pelanggan').val(nama);
                    $('#alamat').val(alamat);
                    $('#nomor').val(nomor);
                });
            });
        </script>

    </x-dynamic-content>
@endsection
