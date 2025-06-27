@extends('layouts.appmahasiswa')

@section('title', 'Pengaduan Saya')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
<div class="card-header bg-primary text-white">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
        <h5 class="mb-0">Pengaduan Saya</h5>
<a href="{{ route('mahasiswa.pengaduan.create') }}" class="btn btn-success btn-sm text-white fw-bold">
    + Buat Pengaduan
</a>

    </div>
</div>


                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Tanggapan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pengaduans as $pengaduan)
                                <tr>
                                    <td>{{ $pengaduan->judul }}</td>
                                    <td>{{ $pengaduan->kategori->nama_kategori }}</td>
                                    <td>
                                        <span class="badge text-white bg-{{ 
                                            $pengaduan->status == 'pending' ? 'secondary' : 
                                            ($pengaduan->status == 'diproses' ? 'warning' : 
                                            ($pengaduan->status == 'selesai' ? 'success' : 'danger')) }}">
                                            {{ ucfirst($pengaduan->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $pengaduan->created_at->format('d M Y') }}</td>
                                    <td>
                                        @if($pengaduan->tanggapan)
                                            {{ $pengaduan->tanggapan }}
                                        @else
                                            <span class="text-muted fst-italic">Belum ada tanggapan</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada pengaduan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
