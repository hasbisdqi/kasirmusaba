@extends('bagian.main')

@section('content')
    <x-dynamic-content>
        <!-- Custom styles for this page -->

        <h1 class="h3 mb-0 text-gray-800">BERANDA</h1>
        <p class="mb-4">
            Halaman rangkuman singkat data aplikasi kasir.
        </p>


        <div class="row text-center">
            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <h5>Total Jenis Produk</h5>
                        <h3>{{ $total_produk }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <h5>Total Pelanggan</h5>
                        <h3>{{ $total_pelanggan }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <h5>Penjualan Hari Ini</h5>
                        <h3>Rp.</h3>
                    </div>
                </div>
            </div>
            <!-- Kartu statistik lainnya -->
        </div>

        {{-- <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Grafik Penjualan</h6>
            </div>
             <div class="card-body">
                <!-- Bar Chart -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="myBarChart"></canvas>
                        </div>
                    </div>
                </div>

            </div> 
        </div> --}}
        <!-- Page level custom scripts -->

        <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

        <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
        <script src="{{ asset('js/demo/chart-bar-demo.js') }}"></script>
    </x-dynamic-content>
@endsection
