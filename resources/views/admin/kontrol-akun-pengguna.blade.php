@extends('layouts-admin.dashboard-admin')
@section('page-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Akun Customer</h1>
        </div>

        <!-- Content table -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No.Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->nama_customer }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->no_telp }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit-akun-pengguna', $user->customer_id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action='{{ route('admin.hapus-akun-pengguna', $user->customer_id) }}'
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
                <a href="{{ route('admin.buat-akun-pengguna') }}" class="btn btn-primary btn-sm">Tambah Akun Customer</a>
            </div>
        </div>
    @endsection
