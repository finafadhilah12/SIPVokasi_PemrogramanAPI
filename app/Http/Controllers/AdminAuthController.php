<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.loginadmin', ['role' => 'admin']);
    }

    public function showRegisterForm() {
        return view('auth.registeradmin', ['role' => 'admin']);
    }

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('dashboard.admin');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}


    public function register(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Admin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Register berhasil. Silakan login.');
    }

    public function logout() {
        Session::forget('admin');
        return redirect()->route('admin.login');
    }

public function showProfileForm()
{
    $admin = Auth::guard('admin')->user(); // ✅ akses user dari guard

    return view('dashboard.admin.profile', ['admin' => $admin]);
}

public function updateProfile(Request $request)
{
    $admin = Auth::guard('admin')->user(); // ✅ ambil admin login

    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email,' . $admin->id,
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    $admin->nama = $request->nama;
    $admin->email = $request->email;

    if ($request->password) {
        $admin->password = Hash::make($request->password);
    }

    $admin->save();

    // Tidak perlu update session manual karena pakai guard

    return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui.');
}

}
