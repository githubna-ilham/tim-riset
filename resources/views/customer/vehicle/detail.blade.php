@extends('layouts-customer.dashboard-customer')

@section('page-content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Kendaraan</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Informasi Kendaraan</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <p class="text-dark">Gambar:</p>
                            @if (!$vehicle->gambar)
                                <p>N/A</p>
                            @else
                                <img src="#" alt="Vehicle Image">
                            @endif
                        </div>
                        <div class="mb-3">
                            <p class="text-dark">jenis kendaraan:</p>
                            <p>{{ $vehicle->jenis_kendaraan }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="text-dark">Merk:</p>
                            <p>{{ $vehicle->merk }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="text-dark">Nomor polisi:</p>
                            <p>{{ $vehicle->nomor_polisi }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="text-dark">Tahun:</p>
                            <p>{{ $vehicle->tahun }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
