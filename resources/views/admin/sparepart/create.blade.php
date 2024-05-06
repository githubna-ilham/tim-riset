@extends('layouts-admin.dashboard-admin')
@section('page-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Buat Sparepart</h1>
        </div>

        <!-- Content Row -->
        <div class="container-fluid w-50 mb-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.sparepart.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="forsm-label">Nama Sparepart</label>
                            <input type="text" class="form-control @error('nama_sparepart') is-invalid @enderror" name="nama_sparepart" value="{{ old('nama_sparepart') }}">
                            @error('nama_sparepart')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="forsm-label">Merk</label>
                            <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{ old('merk') }}">
                            @error('merk')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="forsm-label">Harga</label>
                            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}">
                            @error('harga')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="forsm-label">Stok</label>
                            <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok') }}">
                            @error('stok')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-select" name="kategori_id">
                                @foreach ($categories as $category)
                                    @if (old('kategori_id') == $category->kategori_id)
                                        <option value="{{ $category->kategori_id }}" selected>{{ $category->nama_kategori }}</option>
                                    @else
                                        <option value="{{ $category->kategori_id }}">{{ $category->nama_kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
