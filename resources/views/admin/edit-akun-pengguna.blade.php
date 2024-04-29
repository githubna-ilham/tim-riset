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
                        <div class="card-body">
                            <!-- Formulir unggah gambar -->
                            <h5 class="card-title">Upload Image</h5>
                            <form enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Choose File</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
