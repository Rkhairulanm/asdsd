@extends('main')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Ubah Password</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @if (Session::has('status'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> {{ Session::get('message') }}</h5>
                    </div>
                @endif
                <div class="form-group">
                    <label for="password">Masukan Password</label>
                    <input type="text" class="form-control" id="password"
                        name="password" placeholder="Masukan Password" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/user-kelola" class="btn btn-danger float-right">Back</a>
            </div>
        </form>
    </div>
@endsection
