@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
<form method="POST" action="{{ route('admin.login') }}">
    @csrf

<input type="hidden" name="role" value="{{ $role }}">


    <label for="email">Email</label>
    <input type="email" name="email" required>

    <label for="password">Password</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>

    <p class="text-center text-small">Belum punya akun?
        <a href="{{ route('admin.register') }}">Daftar di sini</a>
    </p>
</form>
@endsection
