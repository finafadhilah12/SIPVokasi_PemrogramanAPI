<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        if (!$mahasiswa) {
            abort(403, 'Unauthorized');
        }

        $pengaduans = Pengaduan::where('mahasiswa_id', $mahasiswa->id)->latest()->get();

        return view('dashboard.mahasiswa.pengaduan.index', compact('pengaduans'));
    }

    public function create()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        if (!$mahasiswa) {
            abort(403, 'Unauthorized');
        }

        $kategoris = Kategori::all();
        return view('dashboard.mahasiswa.pengaduan.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        if (!$mahasiswa) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['kategori_id', 'judul', 'deskripsi']);
        $data['mahasiswa_id'] = $mahasiswa->id;

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pengaduan_foto', 'public');
        }

        Pengaduan::create($data);

        return redirect()->route('mahasiswa.pengaduan.index')->with('success', 'Pengaduan berhasil dikirim.');
    }
}
