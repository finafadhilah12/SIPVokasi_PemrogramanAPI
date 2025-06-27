@extends('layouts.appadmin')

@section('title', 'Dokumentasi API')

@section('content')
<div class="row">
    <div class="col-12">
        {{-- Dokumentasi API Kategori --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white fw-bold">
                <i class="bi bi-journal-code me-1"></i> Dokumentasi API Kategori
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0">
                        <thead class="table-light text-center">
                            <tr>
                                <th style="width: 7%;">Method</th>
                                <th style="width: 18%;">Endpoint</th>
                                <th style="width: 20%;">Deskripsi</th>
                                <th style="width: 25%;">Body / Parameter</th>
                                <th style="width: 30%;">Contoh Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- GET --}}
                            <tr>
                                <td class="text-center">
                                    <span class="badge bg-primary text-white">GET</span>
                                </td>
                                <td><code>http://127.0.0.1:8000/api/kategori</code></td>
                                <td>Ambil semua data kategori</td>
                                <td class="text-muted fst-italic text-center">-</td>
                                <td>
<pre class="bg-light p-2 rounded mb-0"><code>[
  {
    "id": 1,
    "nama_kategori": "Teknologi",
    "deskripsi": "Kategori berita teknologi"
  },
  ...
]</code></pre>
                                </td>
                            </tr>

                            {{-- POST --}}
                            <tr>
                                <td class="text-center">
                                    <span class="badge bg-success text-white">POST</span>
                                </td>
                                <td><code>http://127.0.0.1:8000/api/kategori</code></td>
                                <td>Tambah kategori baru</td>
                                <td>
<pre class="bg-light p-2 rounded mb-0"><code>{
  "nama_kategori": "Kesehatan",
  "deskripsi": "Berita dan tips kesehatan"
}</code></pre>
                                </td>
                                <td>
<pre class="bg-light p-2 rounded mb-0"><code>{
  "message": "Kategori berhasil ditambahkan",
  "data": {
    "id": 2,
    "nama_kategori": "Kesehatan",
    "deskripsi": "Berita dan tips kesehatan"
  }
}</code></pre>
                                </td>
                            </tr>

                            {{-- PUT --}}
                            <tr>
                                <td class="text-center">
                                    <span class="badge bg-warning text-white">PUT</span>
                                </td>
                                <td><code>http://127.0.0.1:8000/api/kategori/{id}</code></td>
                                <td>Update kategori berdasarkan ID</td>
                                <td>
<pre class="bg-light p-2 rounded mb-0"><code>{
  "nama_kategori": "Kesehatan Update",
  "deskripsi": "Deskripsi baru"
}</code></pre>
                                </td>
                                <td>
<pre class="bg-light p-2 rounded mb-0"><code>{
  "message": "Kategori berhasil diperbarui",
  "data": {
    "id": 2,
    "nama_kategori": "Kesehatan Update",
    "deskripsi": "Deskripsi baru"
  }
}</code></pre>
                                </td>
                            </tr>

                            {{-- DELETE --}}
                            <tr>
                                <td class="text-center">
                                    <span class="badge bg-danger text-white">DELETE</span>
                                </td>
                                <td><code>http://127.0.0.1:8000/api/kategori/{id}</code></td>
                                <td>Hapus kategori berdasarkan ID</td>
                                <td class="text-muted fst-italic text-center">-</td>
                                <td>
<pre class="bg-light p-2 rounded mb-0"><code>{
  "message": "Kategori berhasil dihapus"
}</code></pre>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Dokumentasi API Mahasiswa --}}
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white fw-bold">
                <i class="bi bi-journal-code me-1"></i> Dokumentasi API Mahasiswa
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0">
                        <thead class="table-light text-center">
                            <tr>
                                <th style="width: 7%;">Method</th>
                                <th style="width: 18%;">Endpoint</th>
                                <th style="width: 20%;">Deskripsi</th>
                                <th style="width: 25%;">Body / Parameter</th>
                                <th style="width: 30%;">Contoh Response</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- GET All Mahasiswa --}}
                            <tr>
                                <td class="text-center">
                                    <span class="badge bg-primary text-white">GET</span>
                                </td>
                                <td><code>http://127.0.0.1:8000/api/mahasiswa</code></td>
                                <td>Ambil semua data mahasiswa</td>
                                <td class="text-muted fst-italic text-center">-</td>
                                <td>
<pre class="bg-light p-2 rounded mb-0"><code>[
  {
    "id": 1,
    "nama": "Budi",
    "nim": "123456789",
    "email": "budi@example.com",
    "jurusan": "Informatika"
  },
  ...
]</code></pre>
                                </td>
                            </tr>

                            {{-- GET Mahasiswa by NIM --}}
                            <tr>
                                <td class="text-center">
                                    <span class="badge bg-primary text-white">GET</span>
                                </td>
                                <td><code>http://127.0.0.1:8000/api/mahasiswa/{nim}</code></td>
                                <td>Ambil data mahasiswa berdasarkan NIM</td>
                                <td class="text-muted fst-italic text-center">Parameter di URL: {nim}</td>
                                <td>
<pre class="bg-light p-2 rounded mb-0"><code>{
  "id": 1,
  "nama": "Budi",
  "nim": "123456789",
  "email": "budi@example.com",
  "jurusan": "Informatika"
}</code></pre>
                                </td>
                            </tr>

                            {{-- PUT Mahasiswa --}}
                            <tr>
                                <td class="text-center">
                                    <span class="badge bg-warning text-white">PUT</span>
                                </td>
                                <td><code>http://127.0.0.1:8000/api/mahasiswa/{id}</code></td>
                                <td>Update data mahasiswa berdasarkan ID</td>
                                <td>
<pre class="bg-light p-2 rounded mb-0"><code>{
  "nama": "Budi Update",
  "nim": "987654321",
  "jurusan": "Sistem Informasi",
  "email": "budi.new@example.com",
  "password": "passwordbaru",
  "password_confirmation": "passwordbaru"
}</code></pre>
                                </td>
                                <td>
<pre class="bg-light p-2 rounded mb-0"><code>{
  "message": "Data mahasiswa berhasil diperbarui",
  "data": {
    "id": 1,
    "nama": "Budi Update",
    "nim": "987654321",
    "jurusan": "Sistem Informasi",
    "email": "budi.new@example.com"
  }
}</code></pre>
                                </td>
                            </tr>

                            {{-- DELETE Mahasiswa --}}
                            <tr>
                                <td class="text-center">
                                    <span class="badge bg-danger text-white">DELETE</span>
                                </td>
                                <td><code>http://127.0.0.1:8000/api/mahasiswa/{id}</code></td>
                                <td>Hapus data mahasiswa berdasarkan ID</td>
                                <td class="text-muted fst-italic text-center">Parameter di URL: {id}</td>
                                <td>
<pre class="bg-light p-2 rounded mb-0"><code>{
  "message": "Data mahasiswa berhasil dihapus"
}</code></pre>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
