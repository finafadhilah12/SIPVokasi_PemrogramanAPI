<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $total = Pengaduan::count();
        $totalSelesai = Pengaduan::where('status', 'selesai')->count();
        $totalProses = Pengaduan::where('status', 'proses')->count();
        $totalPending = Pengaduan::where('status', 'pending')->count(); // ✅ Tambahan

        return view('dashboard.admin.index', [
            'total' => $total,
            'selesai' => $totalSelesai,
            'proses' => $totalProses,
            'pending' => $totalPending // ✅ Tambahan
        ]);
    }
}
