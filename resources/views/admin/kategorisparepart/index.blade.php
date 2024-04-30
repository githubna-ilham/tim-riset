@extends('layouts-admin.dashboard-admin')

@section('page-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        @if (session()->has('berhasil'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('berhasil') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        @if (session()->has('diubah'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('diubah') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

     

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Kategori Sparepart</h1>
        </div>

        <!-- Content table -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($kategori as $k)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->nama_kategori }}</td>
                                    <td>
                                    <a href="{{ route('admin.kategorisparepart.edit', $k->kategori_id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action='{{ route('admin.kategorisparepart.delete', $k->kategori_id) }}' method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.kategorisparepart.tambah-kategori') }}" class="btn btn-primary btn-sm">Tambah Kategori</a>
            </div>
        </div>
    </div>
    @endsection