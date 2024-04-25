@extends('main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="">Riwayat Penjualan</h4>
                                </div>
                                <form action="" method="get">
                                    <div class="pe-md-3 d-flex align-items-center float-end">
                                        <div class="input-group">
                                            <span style="max-height: 42px" class="input-group-text text-body"><i
                                                    class="fas fa-search" aria-hidden="true"></i></span>
                                            <input style="max-height: 42px;" type="text" class="form-control"
                                                placeholder="Masukan No. Struk" name="keyword">
                                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <hr class="bg-dark px-auto">
                            @if (Session::has('status'))
                                <div class="alert alert-success text-white opacity-5" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class="mx-4 mb-5">
                                    @foreach ($penjualan as $penjualan)
                                        <a href="/struk-detail/{{ $penjualan->penjualan_id }}">
                                            <div class="row me-4">
                                                <div class="col">
                                                    <div class="d-flex mt-3">
                                                        <i
                                                            class="text-secondary ps-4 mt-4 fa-solid fa-receipt fa-2xl mr-4"></i>
                                                        <h6 class="text-m text-dark ps-3 text-bold ms-3">
                                                            <b>{{ $detail->struk }} </b><br><span class="text-secondary">
                                                                {{ $penjualan->pelanggan->nama_pelanggan }}
                                                            </span>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col float-right" style="padding-top: 17px">
                                                    <h6
                                                        class="text-m text-dark font-weight-bold ps-3 text-bold float-right">
                                                        <b>{{ $detail->subtotal }}</b><br><span
                                                            class="text-secondary">{{ $currentTime }}</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <hr class="bg-dark">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
