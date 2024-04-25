@extends('main')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box for Penghasilan Bulan Ini -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalPenghasilan }}</h3>
                    <p>Penghasilan Bulan Ini</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <a href="#" class="small-box-footer"></i></a>
            </div>
        </div>
        <!-- Repeat for other metrics -->
        <div class="col-lg-3 col-6">
            <!-- small box for Total Pemesanan -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalPemesanan }}</h3>
                    <p>Total Pemesanan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-cart"></i>
                </div>
                <a href="#" class="small-box-footer"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box for Total Penghasilan -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalHarga }}</h3>
                    <p>Total Penghasilan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box for Total Barang -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalStok }}</h3>
                    <p>Total Barang</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer"></i></a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold">Welcome</p>
                                <h5 class="font-weight-bolder">{{ Auth::user()->name }}</h5>
                                <p class="mb-3 mt-2">Start Managing Products</p>
                                <a href="/produk"><button class="btn btn-primary">Manage Products</button></a>
                            </div>
                        </div>
                        <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                            <div class="bg-gradient-primary border-radius-lg h-100">
                                <!-- Ganti tag img dengan tag untuk ikon dari Font Awesome -->
                                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                    <!-- Tambahkan kelas untuk ikon Hippo dari Font Awesome dan ubah ukurannya -->
                                    <i class="fa fa-boxes-stacked text-white display-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-lg-0 mb-4 mt-3">
            <div class="card">
                <div class="card-body p-3 ">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold">Pemesanan Terbanyak</p>
                                @if (isset($produkTeratasInfo))
                                    <h5 class="font-weight-bolder">{{ $produkTeratasInfo->nama_produk }}</h5>
                                    <p class="mb-3 mt-2">Total Pemesanan : {{ $totalPenjualanTeratas }}</p>
                                    <a class="text-secondar text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                        href="/detail-penjualan/{{ $produkTeratasInfo->produk_id }}">
                                        Cek Pemesanan
                                        <i cl ass="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                @else
                                    <h5 class="font-weight-bolder">Tidak Ada Penjualan</h5>
                                @endif

                            </div>
                        </div>
                        <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                            @if (isset($produkTeratasInfo))
                                <img src="{{ asset('images/' . $produkTeratasInfo->gambar) }}" class="card-img rounded"
                                    style="object-fit: cover;max-width: 165px; max-height: 145px;" alt="...">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-4 mt-3">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h4 class="text-center">Total Casbon</h4>
                </div>
                <div class="card-body p-3">
                    <h5 class="text-secondary">Jumlah Kasbon</h5>
                    <h6 class="text-secondary"><u>{{ $jumlahKasbon }}</u></h6>
                    <hr class="bg-dark">
                    <h5 class="text-secondary">Total Kasbon</h5>
                    <h6 class="text-secondary"><u>{{ $totalKasbonBelumLunasi }}</u></h6>
                    <hr class="bg-dark">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-4 mt-3">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h4 class="text-center">Informasi Pembayaran</h4>
                </div>
                <div class="card-body p-3">
                    <h5 class="text-secondary">Jumlah Kasbon</h5>
                    <h6 class="text-secondary"><u>{{ $jumlahKasbon }}</u></h6>
                    <hr class="bg-dark">
                    <h5 class="text-secondary">Jumlah yang Belum Lunas</h5>
                    <h6 class="text-secondary"><u>{{ $jumlahBelumLunas }}</u></h6>
                    <hr class="bg-dark">
                    <h5 class="text-secondary">Jumlah yang Sudah Lunas</h5>
                    <h6 class="text-secondary"><u>{{ $jumlahLunas }}</u></h6>
                    <hr class="bg-dark">
                </div>

            </div>
        </div>
    </div>
@endsection