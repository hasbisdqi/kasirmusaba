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
                        <input type="date" class="form-control" value="{{ \Carbon\Carbon::now()->toDateString() }}"
                            readonly>
                    </div>
                    <div class="form-group col-4">
                        <label>No. Nota</label>
                        <input type="text" class="form-control" value="R43-160821001" readonly>
                    </div>
                    <div class="form-group col-4">
                        <label>Pelanggan</label>
                        <select class="form-control">
                            <option value="">Pilih Pelanggan</option>
                            @foreach ($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}">{{ $pelanggan->NamaPelanggan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <div class="col-1">

            </div>
            <div class="card col-5 border-primary text-center">
                <h4>Total Belanja</h4>

                <h1 class="text-danger" id="totalBelanja">Rp. 0</h1>
            </div>
        </div>


        <!-- Barcode Input -->
        <div class="form-group mb-4">
            <form onsubmit="">
                <input type="text" class="form-control" name="barcode"
                    placeholder="Ketik kode atau nama barang kemudian tekan ENTER pd keyboard, atau scan barcode"
                    autofocus>
            </form>
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
                <tbody id="products">
                    {{-- @foreach ($produks as $produk)
                        <tr>
                            <td>{{ $produk->KodeProduk }}</td>
                            <td>{{ $produk->KodeProduk }}</td>
                            <td>Rp. {{ number_format($produk->Harga, 0, ',', '.') }}</td>
                            <td>
                                <div class="d-flex">
                                    <input type="number" class="form-control mr-2" value="1" style="width: 70px">
                                </div>
                            </td>
                            <td>Rp. {{ number_format($produk->Harga * 1, 0, ',', '.') }}</td>
                            <td><button class="btn btn-danger btn-sm">Hapus</button></td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>

        <!-- Action Buttons -->


        <!-- Summary -->
        <div class="row">
            <div class="col-8">
                <div class="d-flex">
                    <form action="/kasir" class="mr-2">
                        <input type="text" name="id_pelanggan" hidden>
                        <input type="text" name="total_harga" hidden>
                        <input type="text" name="total_bayar" hidden>
                        <input type="text" name="kembalian" hidden>
                        <input type="text" name="tanggal_penjualan" hidden>
                        <input type="text" name="detail_penjualans" hidden>
                        <button class="btn btn-success">Simpan Transaksi</button>
                    </form>
                    <button class="btn btn-orange" id="reset">Reset Form</button>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between font-weight-bold mb-2">
                            <span>Grandtotal</span>
                            <span id="grandTotal">Rp. 0</span>
                        </div>

                        <div class="d-flex justify-content-between font-weight-bold mb-2">
                            <span>Dibayar</span>
                            <input class="form-control p-1 col-6" name="dibayar">
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between font-weight-bold mb-2">
                            <span>Kembalian</span>
                            <span id="change">Rp. 0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Focus to barcode input
        document.querySelector('input[name="barcode"]').focus();

        // Log products from localStorage
        const tbody = document.querySelector('#products');
        let products = JSON.parse(localStorage.getItem('products')) || [];
        renderProducts(products);

        function renderProducts(products) {
            const tbody = document.querySelector('#products');
            const grandTotal = products.reduce((acc, product) => acc + (product.harga * product.qty), 0);
            document.querySelector('#grandTotal').textContent = 'Rp. ' + grandTotal.toLocaleString();
            document.querySelector('#totalBelanja').textContent = 'Rp. ' + grandTotal.toLocaleString();
            const dibayarInput = document.querySelector('input[name="dibayar"]');
            dibayarInput.addEventListener('input', function() {
                const dibayar = parseFloat(dibayarInput.value) || 0;
                document.querySelector('#change').textContent = ((dibayar - grandTotal) < 0 ? 'Kurang!' : 'Rp. ' + (
                    dibayar - grandTotal).toLocaleString());
            });

            tbody.innerHTML = ''; // Clear existing rows
            products.forEach(product => {
                const row = document.createElement('tr');
                row.innerHTML = `
                <td>${product.kode}</td>
                <td>${product.nama}</td>
                <td>Rp. ${product.harga.toLocaleString()}</td>
                <td>
                <div class="d-flex">
                    <input type="number" class="form-control mr-2" value="${product.qty}" min="1" style="width: 70px" onchange="updateQty('${product.kode}', this.value)">
                </div>
                </td>
                <td>Rp. ${(product.harga * product.qty).toLocaleString()}</td>
                <td><button class="btn btn-danger btn-sm">Hapus</button></td>
            `;
                tbody.appendChild(row);
                row.querySelector('button').addEventListener('click', function() {
                    const index = products.findIndex(p => p.kode === product.kode);
                    if (index !== -1) {
                        products.splice(index, 1);
                        localStorage.setItem('products', JSON.stringify(products));
                        renderProducts(products);
                    }
                });

            });
        }

        // Reset form
        document.querySelector('#reset').addEventListener('click', function() {
            products = [];
            localStorage.setItem('products', JSON.stringify(products));
            renderProducts(products);
            document.querySelector('input[name="barcode"]').value = '';
            document.querySelector('input[name="dibayar"]').value = '';
            document.querySelector('#change').textContent = 'Rp. 0';
        });

        // TODO: SUBMIT FORM

        function updateQty(kode, qty) {
            const index = products.findIndex(p => p.kode === kode);
            if (index !== -1) {
                products[index].qty = parseInt(qty);
                localStorage.setItem('products', JSON.stringify(products));
                renderProducts(products);
            }
        }
        // Handle form submit
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            const barcode = document.querySelector('input[name="barcode"]').value;
            const produk = @json($produks).find(p => p.KodeProduk === barcode);
            if (produk) {
                const existingProduct = products.find(p => p.kode === produk.KodeProduk);
                if (existingProduct) {
                    existingProduct.qty += 1;
                } else {
                    products.push({
                        kode: produk.KodeProduk,
                        nama: produk.NamaProduk,
                        harga: produk.Harga,
                        qty: 1
                    });
                }
                localStorage.setItem('products', JSON.stringify(products));
                renderProducts(products);
            } else {
                alert('Produk tidak ditemukan');
            }
            // alert('Form submitted with barcode: ' + barcode);
            document.querySelector('input[name="barcode"]').value = '';
        });
    </script>

    <!-- Bootstrap 4 JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
