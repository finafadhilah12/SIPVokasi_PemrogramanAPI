@extends('layouts.appmahasiswa')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="container col-12">
    <h3>Selamat datang, {{ $mahasiswa->email }}</h3>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Pengaduan Anda</h5>
                    <p class="card-text fs-3 fw-bold">{{ $totalPengaduan }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
