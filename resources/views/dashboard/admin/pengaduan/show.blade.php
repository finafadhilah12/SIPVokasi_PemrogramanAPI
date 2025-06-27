@extends('layouts.appadmin')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Detail Pengaduan</h5>
            </div>

            <div class="card-body">
                <h5 class="fw-bold">{{ $pengaduan->judul }}</h5>

                <p><strong>Kategori:</strong> {{ $pengaduan->kategori->nama_kategori }}</p>
                <p><strong>Deskripsi:</strong><br>{{ $pengaduan->deskripsi }}</p>

                @if($pengaduan->foto)
                    <p><strong>Foto:</strong><br>
<img src="{{ asset('storage/' . $pengaduan->foto) }}"
     alt="Foto Pengaduan"
     class="img-fluid rounded shadow-sm"
     style="max-width: 150px; height: auto;">
                    </p>
                @endif

                <p>
                    <strong>Status:</strong>
                    <span class="badge text-white bg-{{ 
                        $pengaduan->status == 'pending' ? 'secondary' :
                        ($pengaduan->status == 'diproses' ? 'warning' :
                        ($pengaduan->status == 'selesai' ? 'success' : 'danger')) }}">
                        {{ ucfirst($pengaduan->status) }}
                    </span>
                </p>

                <p><strong>Tanggal:</strong> {{ $pengaduan->created_at->format('d M Y') }}</p>

                <hr>

                <form action="{{ route('admin.pengaduan.tanggapi', $pengaduan->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="pending" {{ $pengaduan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="diproses" {{ $pengaduan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="ditolak" {{ $pengaduan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggapan" class="form-label">Tanggapan</label>
                        <textarea name="tanggapan" class="form-control" rows="4" required>{{ $pengaduan->tanggapan }}</textarea>
                    </div>

<div class="d-flex">
                        <button type="submit" class="btn btn-success fw-bold text-white" style="margin-right: 10px;">Simpan Tanggapan</button>
                        <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
