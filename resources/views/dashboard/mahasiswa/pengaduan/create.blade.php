@extends('layouts.appmahasiswa')

@section('title', 'Buat Pengaduan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Buat Pengaduan Baru</h5>
            </div>

            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Terjadi kesalahan:</strong>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('mahasiswa.pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Pengaduan</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Pendukung (opsional)</label>
                        <input type="file" name="foto" class="form-control">
                    </div>

<div class="d-flex">
    <a href="{{ route('mahasiswa.pengaduan.index') }}" class="btn btn-secondary" style="margin-right: 10px;">Kembali</a>
    <button type="submit" class="btn btn-success fw-bold text-white">Kirim</button>
</div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
