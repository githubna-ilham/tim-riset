@extends('layouts-customer.dashboard-customer')

@section('page-content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kendaraan anda</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor polisi</th>
                            <th>Jenis kendaraan</th>
                            <th>Merek</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $vehicle)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $vehicle->nomor_polisi }}</td>
                            <td>{{ $vehicle->jenis_kendaraan }}</td>
                            <td>{{ $vehicle->merk }}</td>
                            <td>
                                <a href="{{ route('customer.vehicle.detail') }}" class="btn btn-primary btn-sm"><i class="fas fa-file"></i> Detail</a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                            </td>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('customer.vehicle.create') }}" class="btn btn-primary btn-sm">Tambah kendaraan</a>
        </div>
    </div>

</div>
@endsection
