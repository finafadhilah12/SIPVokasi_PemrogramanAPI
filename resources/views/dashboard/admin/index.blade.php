@extends('layouts.appadmin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container col-12">
    <h3>Selamat datang, Admin!</h3>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Semua Pengaduan</h5>
                    <p class="card-text fs-3 fw-bold">{{ $total }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Selesai</h5>
                    <p class="card-text fs-3 fw-bold">{{ $selesai }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Proses</h5>
                    <p class="card-text fs-3 fw-bold">{{ $proses }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Pending</h5>
                    <p class="card-text fs-3 fw-bold">{{ $pending }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
