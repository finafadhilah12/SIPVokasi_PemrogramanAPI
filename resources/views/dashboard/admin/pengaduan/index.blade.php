@extends('layouts.appadmin')

@section('title', 'Data Pengaduan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Data Pengaduan Mahasiswa</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Mahasiswa</th>
                                <th>NIM</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pengaduans as $pengaduan)
                            <tr>
                                <td>{{ $pengaduan->mahasiswa->nama }}</td>
                                <td>{{ $pengaduan->mahasiswa->nim}}</td>
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
                                    <a href="{{ route('admin.pengaduan.show', $pengaduan->id) }}" class="btn btn-info btn-sm text-white">Detail</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada pengaduan.</td>
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
