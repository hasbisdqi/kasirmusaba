<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Musaba</title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .btn-orange {
            background-color: #fd7e14;
            color: white;
        }

        .btn-orange:hover {
            background-color: #f17012;
            color: white;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid p-4">
        {{-- logo aplikasi --}}
        <div class="row">
            <div class="col-2">
                <a class="sidebar-brand d-flex" href="index.html">
                    <img src="/img/logokasir.jpg">
                </a>
            </div>
            <div class="col-9">
                <marquee direction='left' scrolldelay='300' class="pt-3" mt-2>
                    <h4>ini merupakan teks berjalan kekiri</h4>
                </marquee>
            </div>
            <div class="col-1 text-right">
              <button class="btn btn-danger p-2 col-12 mt-2">Keluar</button>
          </div>
        </div>


        <!-- Transaction Info -->
        <div class="row p-3">
            <div class="card col-6 border-primary">
              <div class="row">
                <div class="form-group col-4">
                  <label>Tanggal</label>
                  <input type="date" class="form-control" value="2021-08-16" readonly>
              </div>
              <div class="form-group col-4">
                  <label>No. Nota</label>
                  <input type="text" class="form-control" value="R43-160821001" readonly>
              </div>
              <div class="form-group col-4">
                  <label>Pelanggan</label>
                  <select class="form-control">
                    <option value="">Pilih Pelanggan</option>
                  </select>
              </div>
              </div>
                
            </div>
            <div class="col-1">

            </div>
            <div class="card col-5 border-primary text-center">
                <h4>Total Belanja</h4>

                <h1 class="text-danger">Rp. 108.000</h1>
            </div>
        </div>


        <!-- Barcode Input -->
        <div class="form-group mb-4">
            <input type="text" class="form-control"
                placeholder="Ketik kode atau nama barang kemudian tekan ENTER pd keyboard, atau scan barcode" autofocus>
        </div>

        <!-- Products Table -->
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        {{-- <th>Diskon</th> --}}
                        <th>Jumlah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>8991906101026</td>
                        <td>DRAJUM SUPER KRETEK 16</td>
                        <td>Rp. 28,000</td>
                        <td>
                            <div class="d-flex">
                                <input type="number" class="form-control mr-2" value="2" style="width: 70px">

                            </div>
                        </td>

                        <td>Rp. 56,000</td>
                        <td><button class="btn btn-danger btn-sm">Hapus</button></td>
                    </tr>
                    <tr>
                        <td>089686770400</td>
                        <td>INDOMIE GORENG</td>
                        <td>Rp. 2,500</td>
                        <td>
                            <div class="d-flex">
                                <input type="number" class="form-control mr-2" value="13" style="width: 70px">

                            </div>
                        </td>

                        <td>Rp. 32,500</td>
                        <td><button class="btn btn-danger btn-sm">Hapus</button></td>
                    </tr>
                    <tr>
                        <td>089686770401</td>
                        <td>INDOMIE KARI AYAM</td>
                        <td>Rp. 2,500</td>
                        <td>
                            <div class="d-flex">
                                <input type="number" class="form-control mr-2" value="10" style="width: 70px">

                            </div>
                        </td>

                        <td>Rp. 25,000</td>
                        <td><button class="btn btn-danger btn-sm">Hapus</button></td>
                    </tr>
                    <tr>
                        <td>8992759244021</td>
                        <td>NICE FACIAL TISSUE</td>
                        <td>Rp. 7,500</td>
                        <td>
                            <div class="d-flex">
                                <input type="number" class="form-control mr-2" value="3" style="width: 70px">

                            </div>
                        </td>

                        <td>Rp. 22,500</td>
                        <td><button class="btn btn-danger btn-sm">Hapus</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Action Buttons -->
        

        <!-- Summary -->
        <div class="row">
          <div class="col-8">
            <button class="btn btn-success">Simpan Transaksi</button>
            <button class="btn btn-orange">Reset Form</button>
            
        </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="d-flex justify-content-between font-weight-bold mb-2">
                            <span>Grandtotal</span>
                            <span>Rp. 108,000</span>
                        </div>

                        <div class="d-flex justify-content-between font-weight-bold mb-2">
                          <span>Dibayar</span>
                          <input class="form-control p-1 col-6" name="dibayar">
                      </div>
                      <hr>
                      <div class="d-flex justify-content-between font-weight-bold mb-2">
                        <span>Kembalian</span>
                        <span>Rp. 2,000</span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 4 JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
