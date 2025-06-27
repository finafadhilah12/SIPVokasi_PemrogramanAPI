<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class MahasiswaDashboardController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user(); // pastikan guard 'mahasiswa' dipakai
        $totalPengaduan = Pengaduan::where('mahasiswa_id', $mahasiswa->id)->count();

        return view('dashboard.mahasiswa.index', [
            'mahasiswa' => $mahasiswa,
            'totalPengaduan' => $totalPengaduan
        ]);
    }
}
