@extends('main')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="d-flex justify-content-between m-3">
                <div>
                    <a href="/produk-tambah" class="btn btn-success">Tambah Produk</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (Session::has('status'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> {{ Session::get('message') }}</h5>
                    </div>
                @endif
                <table id="produkTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Logs</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Jumlah Pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->logs }}</td>
                                <td>{{ $k->tanggalpenjualan }}</td>
                                <td>{{ $k->pelanggan->nama_pelanggan }}</td>
                                <td>{{ $k->totalharga }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mx-3">{{ $logs->withQueryString()->links() }}</div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
