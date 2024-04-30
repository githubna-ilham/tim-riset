@extends('layouts-admin.dashboard-admin')
@section('page-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Akun, {{ $customer->nama_customer }}</h1>
        </div>
        <!-- Content Row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informasi Akun</h4>
                        </div>
                        <div class="card-body">
                            <!-- Formulir data diri -->
                            <div class="mb-3">
                                <p class="text-dark">Nama Lengkap:</p>
                                <p>{{ $customer->nama_customer }}</p>
                            </div>
                            <div class="mb-3">
                                <p class="text-dark">Username:</p>
                                <p>{{ $customer->username }}</p>
                            </div>
                            <div class="mb-3">
                                <p class="text-dark">Email:</p>
                                <p>{{ $customer->email }}</p>
                            </div>
                            <div class="mb-3">
                                <p class="text-dark">Nomor Telepon:</p>
                                <p>{{ $customer->no_telp }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ganti Password</h4>
                        </div>
                        <div class="card-body">
                            <!-- Formulir unggah gambar -->
                            <form action="{{ route('admin.ganti-password-pengguna', $customer->customer_id) }}"
                                method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="forsm-label">New Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="password">
                                    @error('password')
                                        <small">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Retype Password</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="password">
                                    @error('password_confirmation')
                                        <small">{{ $message }}</small>
                                        @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
