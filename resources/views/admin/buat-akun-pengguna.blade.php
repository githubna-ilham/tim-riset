@extends('layouts-admin.dashboard-admin')
@section('page-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Buat Akun Customer</h1>
        </div>

        <!-- Content Row -->
        <div class="container-fluid w-75">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.proses-buat-akun-pengguna') }}" method="POST">
                        @csrf

                        <h3 class="fs-4 text-dark">Data Diri</h3>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                            <input type="plain" class="form-control" name="nama_lengkap" placeholder="nama"
                                value="{{ old('nama_lengkap') }}">
                            @error('nama_lengkap')
                                <small">{{ $message }}</small>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Username</label>
                            <input type="plain" class="form-control" name="username" placeholder="username"
                                value="{{ old('username') }}">
                            @error('username')
                                <small">{{ $message }}</small>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <small">{{ $message }}</small>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
                            <input type="plain" class="form-control" name="phone" placeholder="no.telp"
                                value="{{ old('phone') }}">
                            @error('phone')
                                <small">{{ $message }}</small>
                                @enderror
                        </div>

                        <h3 class="fs-4 text-dark">Credential</h3>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="password">
                            @error('password')
                                <small">{{ $message }}</small>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="konfirmasi password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
