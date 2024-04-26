@extends('main')

@section('content')
    <div class="preloader flex-column justify-content-center align-items-center">
        <i class="fa-solid fa-hippo animation__wobble" style="font-size: 5em;" alt="AdminLTELogo"></i>
    </div>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between m-3">
                                <div>
                                    <h4 class="">Pendataan Pelanggan</h4>
                                </div>
                                <form action="">
                                    <div class="pe-md-3 d-flex align-items-center float-end">
                                        <div class="input-group">
                                            <span style="max-height: 42px" class="input-group-text text-body"><i
                                                    class="fas fa-search" aria-hidden="true"></i></span>
                                            <input type="text" id="searchInput" name="keyword" class="form-control"
                                                placeholder="Cari produk...">
                                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <hr class="bg-dark px-auto">
                            @if (Session::has('status'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> {{ Session::get('message') }}</h5>
                                </div>
                            @endif

                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table id="pelangganTable" class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder">No</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder">Nama Pelanggan
                                            </th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">Alamat</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">
                                                No Telpon</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pelanggan as $k)
                                            <tr class="ps-2">
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="ps-2 text-secondary text-sm font-weight-bold">
                                                            {{ $loop->iteration }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="ps-2 text-secondary text-sm font-weight-bold">
                                                            {{ $k->nama_pelanggan }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                            {{ $k->alamat }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                            {{ $k->notelpon }}</h6>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="/pelanggan-detail/{{ $k->pelanggan_id }}"><span
                                                            class="btn bg-gradient-info">Detail</span></a>
                                                    <a href="/edit-pelanggan/{{ $k->pelanggan_id }}"><span
                                                            class="btn bg-gradient-warning mx-2 text-white  ">Edit</span></a>
                                                    <a href="/delete-pelangan/{{ $k->pelanggan_id }}"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')"><span
                                                            class="btn bg-gradient-danger ">Hapus</span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mx-3">{{ $pelanggan->withQueryString()->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
