@extends('layouts-admin.dashboard-admin')
@section('page-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Sparepart</h1>
        </div>

        <!-- Display Success Message -->
        {{-- @if (session('success'))
            <div id="liveAlertPlaceholder" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn btn-primary" id="liveAlertBtn"></button>
            </div>
        @endif --}}


        <!-- Content table -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Sparepart</th>
                                <th>Merk</th>
                                <th>Kategory</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Image</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sparepart as $sparepart)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sparepart->nama_sparepart }}</td>
                                    <td>{{ $sparepart->merk }}</td>
                                    <td>#</td>
                                    <td>{{ $sparepart->stok }}</td>
                                    <td>{{ $sparepart->harga }}</td>
                                    <td>{{ $sparepart->image }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit-sparepart', $sparepart->sparepart_id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action='{{ route('admin.hapus-sparepart', $sparepart->sparepart_id) }}'
                                            method="POST" class="d-inline">
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
                <a href="#" class="btn btn-primary btn-sm">Tambah Sparepart</a>
            </div>
        </div>
    @endsection
