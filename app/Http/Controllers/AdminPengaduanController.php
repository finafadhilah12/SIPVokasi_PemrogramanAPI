<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPengaduanController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        if (!$admin) {
            abort(403, 'Unauthorized');
        }

        $pengaduans = Pengaduan::with('kategori', 'mahasiswa')->latest()->get();
        return view('dashboard.admin.pengaduan.index', compact('pengaduans'));
    }

    public function show($id)
    {
        $admin = Auth::guard('admin')->user();
        if (!$admin) {
            abort(403, 'Unauthorized');
        }

        $pengaduan = Pengaduan::with('kategori', 'mahasiswa')->findOrFail($id);
        return view('dashboard.admin.pengaduan.show', compact('pengaduan'));
    }

    public function tanggapi(Request $request, $id)
    {
        $admin = Auth::guard('admin')->user();
        if (!$admin) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'status' => 'required|in:pending,diproses,selesai,ditolak',
            'tanggapan' => 'nullable|string',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $request->status;
        $pengaduan->tanggapan = $request->tanggapan;
        $pengaduan->admin_id = $admin->id;
        $pengaduan->save();

        return redirect()->route('admin.pengaduan.index')->with('success', 'Pengaduan berhasil diperbarui.');
    }
}
