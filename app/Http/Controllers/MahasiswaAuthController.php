<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MahasiswaAuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.loginmahasiswa', ['role' => 'mahasiswa']);
    }

    public function showRegisterForm() {
        return view('auth.registermahasiswa', ['role' => 'mahasiswa']);
    }

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('mahasiswa')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('dashboard.mahasiswa');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}

    public function register(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'email' => 'required|email|unique:mahasiswas',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('mahasiswa.login')->with('success', 'Register berhasil. Silakan login.');
    }

    public function logout() {
        Session::forget('mahasiswa');
        return redirect()->route('mahasiswa.login');
    }

public function editProfile()
{
    $mahasiswa = Auth::guard('mahasiswa')->user(); // ✅ ambil user dari guard

    if (!$mahasiswa) {
        return redirect()->route('mahasiswa.login')->withErrors(['msg' => 'Silakan login terlebih dahulu.']);
    }

    return view('dashboard.mahasiswa.profile', ['mahasiswa' => $mahasiswa]);
}

public function updateProfile(Request $request)
{
    $mahasiswa = Auth::guard('mahasiswa')->user(); // ✅ ambil user dari guard

    if (!$mahasiswa) {
        return redirect()->route('mahasiswa.login')->withErrors(['msg' => 'Data mahasiswa tidak ditemukan.']);
    }

    $request->validate([
        'nama' => 'required|string|max:255',
        'nim' => 'required|string|max:50',
        'jurusan' => 'required|string|max:100',
        'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    $mahasiswa->nama = $request->nama;
    $mahasiswa->nim = $request->nim;
    $mahasiswa->jurusan = $request->jurusan;
    $mahasiswa->email = $request->email;

    if ($request->filled('password')) {
        $mahasiswa->password = Hash::make($request->password);
    }

    $mahasiswa->save();

    // Tidak perlu update session manual

    return redirect()->route('mahasiswa.profile')->with('success', 'Profil berhasil diperbarui.');
}

}
