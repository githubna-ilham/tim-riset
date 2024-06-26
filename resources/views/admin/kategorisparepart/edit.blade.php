@extends('layouts-admin.dashboard-admin')

@section('page-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Kategori Sparepart</h1>
        </div>

        <!-- Content table -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.kategorisparepart.update', $kategori->kategori_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}">
                    </div>
                    <a href="{{ route('admin.kategorisparepart.index') }}"><button type="submit" class="btn btn-primary">Simpan</button></a>
                </form>
            </div>
        </div>
    </div>
@endsection