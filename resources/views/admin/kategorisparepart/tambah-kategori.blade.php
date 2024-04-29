@extends('layouts-admin.dashboard-admin')

@section('page-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Kategori Sparepart</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.kategorisparepart.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori">
                            </div>
                            <a href="{{ route('admin.kategorisparepart.index') }}"><button type="submit" class="btn btn-primary">Tambah</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection