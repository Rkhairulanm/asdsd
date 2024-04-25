@extends('main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg mb-5">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-4 px-3">
                        <div class="card-header pb-0">
                            <h4 class="text-center">Detail Pembelian</h4>
                            <hr class="bg-dark px-auto">
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <!-- Informasi Pembelian -->
                            @if (Session::has('status'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> {{ Session::get('message') }}</h5>
                                </div>
                            @endif
                            <div class="info">
                                <div class="info-item">
                                    <span class="info-label">Nama : </span>
                                    <span class="info-value"><u>{{ $pelanggan->nama_pelanggan }}</u></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Total Pembelian : </span>
                                    <span class="info-value"><u>{{ $detail->sum('subtotal') }}</u></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Total Pembayaran : </span>
                                    <span class="info-value"><u>{{ $detail->first()->bayar }}</u></span>
                                </div>

                                <div class="info-item">
                                    <span class="info-label">Status : </span>
                                    @php
                                        $kasbon = false;
                                        $totalPembelian = $detail->sum('subtotal');
                                        $totalPembayaran = $detail->first()->bayar ?? 0;
                                    @endphp
                                    @if ($totalPembayaran != 0 && $totalPembayaran < $totalPembelian)
                                        <span class="badge badge-sm bg-gradient-warning">Belum Lunas</span>
                                        <form action="/pembayaran/{{ $pelanggan->pelanggan_id }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="pelanggan_id"
                                                value="{{ $pelanggan->pelanggan_id }}">
                                            <div class="form-group mb-3">
                                                <label for="pembayaran" class="form-label">Pembayaran:</label>
                                                <input type="number" class="form-control" id="pembayaran" name="pembayaran"
                                                    required>
                                            </div>
                                            <center>
                                                <button type="submit" class="btn btn-primary">Submit Pembayaran</button>
                                            </center>
                                        </form>
                                    @else
                                        @foreach ($detail as $pembelian)
                                            @if ($pembelian->bayar === null)
                                                @php
                                                    $kasbon = true;
                                                    break;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @if ($kasbon)
                                            <span class="badge badge-sm bg-gradient-danger">Kasbon</span>
                                            <form action="/pembayaran/{{ $pelanggan->pelanggan_id }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="pelanggan_id"
                                                    value="{{ $pelanggan->pelanggan_id }}">
                                                <div class="form-group mb-3">
                                                    <label for="pembayaran" class="form-label">Pembayaran:</label>
                                                    <input type="number" class="form-control" id="pembayaran"
                                                        name="pembayaran" required>
                                                </div>
                                                <center>
                                                    <button type="submit" class="btn btn-primary">Submit
                                                        Pembayaran</button>
                                                </center>
                                            </form>
                                        @else
                                            <span class="badge badge-sm bg-gradient-success">Lunas</span>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <!-- Tabel Detail Pembelian -->
                            <div class="table-responsive pt-2">
                                <table class="table table-striped table-bordered table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Produk</th>
                                            <th scope="col">Jumlah Pembelian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detail as $pembelian)
                                            @foreach ($pembelian->produk as $produk)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('images/' . $produk->gambar) }}" class="card-img"
                                                            style="object-fit: cover;max-width: 100px; max-height: 100px;"
                                                            alt="...">
                                                    </td>
                                                    <td>{{ $produk->nama_produk }}</td>
                                                    <td>{{ $pembelian->jumlah }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
