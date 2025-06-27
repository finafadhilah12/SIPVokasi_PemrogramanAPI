<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Mahasiswa;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required|in:admin,mahasiswa',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:' . ($request->role == 'admin' ? 'admins' : 'mahasiswas'),
            'password' => 'required|string|min:6|confirmed',
            'nim' => 'required_if:role,mahasiswa',
            'jurusan' => 'required_if:role,mahasiswa',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->role == 'admin') {
            $user = Admin::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $user = Mahasiswa::create([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'jurusan' => $request->jurusan,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'Registrasi berhasil',
            'token' => $token,
            'user' => $user,
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password', 'role');

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string',
            'role' => 'required|in:admin,mahasiswa',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $model = $credentials['role'] === 'admin' ? Admin::class : Mahasiswa::class;
        $user = $model::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['error' => 'Email atau password salah'], 401);
        }

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => $user,
        ]);
    }

public function me()
{
    try {
        $payload = JWTAuth::parseToken()->getPayload();
        $role = $payload->get('role');

        $user = match ($role) {
            'admin' => Admin::find($payload->get('sub')),
            'mahasiswa' => Mahasiswa::find($payload->get('sub')),
            default => null,
        };

        if (!$user) {
            return response()->json(['error' => 'User tidak ditemukan'], 404);
        }

        return response()->json($user);

    } catch (\Exception $e) {
        return response()->json(['error' => 'Token tidak valid atau user tidak ditemukan'], 401);
    }
}


    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json(['message' => 'Logout berhasil']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Token tidak ditemukan atau invalid'], 401);
        }
    }

    // Mendapatkan semua data mahasiswa
public function getAllMahasiswa()
{
    $mahasiswa = Mahasiswa::all();
    return response()->json($mahasiswa);
}

// Mendapatkan data mahasiswa berdasarkan NIM
public function getMahasiswaByNIM($nim)
{
    $mahasiswa = Mahasiswa::where('nim', $nim)->first();

    if (!$mahasiswa) {
        return response()->json(['error' => 'Mahasiswa tidak ditemukan'], 404);
    }

    return response()->json($mahasiswa);
}

// Mengupdate data mahasiswa berdasarkan ID
public function updateMahasiswa(Request $request, $id)
{
    $mahasiswa = Mahasiswa::find($id);

    if (!$mahasiswa) {
        return response()->json(['error' => 'Mahasiswa tidak ditemukan'], 404);
    }

    $validator = Validator::make($request->all(), [
        'nama' => 'sometimes|required|string|max:255',
        'email' => 'sometimes|required|email|unique:mahasiswas,email,' . $id,
        'nim' => 'sometimes|required|string|unique:mahasiswas,nim,' . $id,
        'jurusan' => 'sometimes|required|string|max:255',
        'password' => 'sometimes|nullable|string|min:6|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    $mahasiswa->update([
        'nama' => $request->nama ?? $mahasiswa->nama,
        'nim' => $request->nim ?? $mahasiswa->nim,
        'jurusan' => $request->jurusan ?? $mahasiswa->jurusan,
        'email' => $request->email ?? $mahasiswa->email,
        'password' => $request->filled('password') ? Hash::make($request->password) : $mahasiswa->password,
    ]);

    return response()->json(['message' => 'Data mahasiswa berhasil diperbarui', 'data' => $mahasiswa]);
}

// Menghapus data mahasiswa berdasarkan ID
public function deleteMahasiswa($id)
{
    $mahasiswa = Mahasiswa::find($id);

    if (!$mahasiswa) {
        return response()->json(['error' => 'Mahasiswa tidak ditemukan'], 404);
    }

    $mahasiswa->delete();

    return response()->json(['message' => 'Data mahasiswa berhasil dihapus']);
}

// ✅ Ambil semua kategori
public function getAllKategori()
{
    $kategori = Kategori::all();
    return response()->json($kategori);
}

// ✅ Tambah kategori baru
public function createKategori(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nama_kategori' => 'required|string|unique:kategoris,nama_kategori',
        'deskripsi' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    $kategori = Kategori::create([
        'nama_kategori' => $request->nama_kategori,
        'deskripsi' => $request->deskripsi,
    ]);

    return response()->json([
        'message' => 'Kategori berhasil ditambahkan',
        'data' => $kategori
    ], 201);
}

// ✅ Update kategori
public function updateKategori(Request $request, $id)
{
    $kategori = Kategori::find($id);

    if (!$kategori) {
        return response()->json(['error' => 'Kategori tidak ditemukan'], 404);
    }

    $validator = Validator::make($request->all(), [
        'nama_kategori' => 'required|string|unique:kategoris,nama_kategori,' . $id,
        'deskripsi' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    $kategori->update([
        'nama_kategori' => $request->nama_kategori,
        'deskripsi' => $request->deskripsi,
    ]);

    return response()->json([
        'message' => 'Kategori berhasil diperbarui',
        'data' => $kategori
    ]);
}

// ✅ Hapus kategori
public function deleteKategori($id)
{
    $kategori = Kategori::find($id);

    if (!$kategori) {
        return response()->json(['error' => 'Kategori tidak ditemukan'], 404);
    }

    $kategori->delete();

    return response()->json(['message' => 'Kategori berhasil dihapus']);
}


}
