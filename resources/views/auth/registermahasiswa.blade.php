@extends('layouts.app')

@section('title', 'Register Mahasiswa')

@section('content')
<form method="POST" action="{{ route('mahasiswa.register.post') }}">
    @csrf

    <label for="nama">Nama</label>
    <input type="text" name="nama" value="{{ old('nama') }}" required>
    @error('nama') <small style="color:red;">{{ $message }}</small> @enderror

    <label for="nim">NIM</label>
    <input type="text" name="nim" value="{{ old('nim') }}" required>
    @error('nim') <small style="color:red;">{{ $message }}</small> @enderror

    <label for="jurusan">Jurusan</label>
    <input type="text" name="jurusan" value="{{ old('jurusan') }}" required>
    @error('jurusan') <small style="color:red;">{{ $message }}</small> @enderror

    <label for="email">Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    @error('email') <small style="color:red;">{{ $message }}</small> @enderror

    <label for="password">Password</label>
    <input type="password" name="password" required>
    @error('password') <small style="color:red;">{{ $message }}</small> @enderror

    <label for="password_confirmation">Konfirmasi Password</label>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Register</button>

    <p class="text-center text-small">Sudah punya akun?
        <a href="{{ route('mahasiswa.login') }}">Login di sini</a>
    </p>
</form>
@endsection
