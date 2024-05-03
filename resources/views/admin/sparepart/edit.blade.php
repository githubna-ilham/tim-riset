@extends('layouts-admin.dashboard-admin')
@section('page-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit, {{ $sparepart->nama_sparepart }}</h1>
        </div>

        <!-- Content Row -->
        <div class="container-fluid w-75">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.edit-info-sparepart', $sparepart->sparepart_id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="forsm-label">Nama Sparepart</label>
                            <input type="plain" class="form-control" name="nama_sparepart"
                                value="{{ $sparepart->nama_sparepart }}">
                            @error('nama_sparepart')
                                <small">{{ $message }}</small>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="forsm-label">Merk</label>
                            <input type="text" class="form-control" name="merk"
                                value="{{ $sparepart->merk }}">
                            @error('merk')
                                <small">{{ $message }}</small>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="forsm-label">Harga</label>
                            <input type="text" class="form-control" name="harga"
                                value="{{ $sparepart->harga }}">
                            @error('harga')
                                <small">{{ $message }}</small>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="forsm-label">Stok</label>
                            <input type="number" class="form-control" name="stok"
                                value="{{ $sparepart->stok }}">
                            @error('stok')
                                <small">{{ $message }}</small>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" name="category_id">
                                @foreach ($categories as $category)
                                    @if (old('category_id') == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
