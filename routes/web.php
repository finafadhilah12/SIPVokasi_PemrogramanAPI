<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\MahasiswaAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPengaduanController;
use App\Http\Controllers\MahasiswaDashboardController;

Route::get('/', function () {
    return view('welcome');
});

// ---------------- ADMIN ----------------
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// ---------------- MAHASISWA ----------------
Route::prefix('mahasiswa')->group(function () {
    Route::get('/login', [MahasiswaAuthController::class, 'showLoginForm'])->name('mahasiswa.login');
    Route::post('/login', [MahasiswaAuthController::class, 'login'])->name('mahasiswa.login.post');
    Route::get('/register', [MahasiswaAuthController::class, 'showRegisterForm'])->name('mahasiswa.register');
    Route::post('/register', [MahasiswaAuthController::class, 'register'])->name('mahasiswa.register.post');
        Route::post('/logout', [MahasiswaAuthController::class, 'logout'])->name('logout.mhs');

});

// ---------------- DASHBOARD ----------------
Route::prefix('dashboard/admin')->middleware('auth:admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/profile', [AdminAuthController::class, 'showProfileForm'])->name('admin.profile');
    Route::post('/profile', [AdminAuthController::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::get('/pengaduan', [AdminPengaduanController::class, 'index'])->name('admin.pengaduan.index');
    Route::get('/pengaduan/{id}', [AdminPengaduanController::class, 'show'])->name('admin.pengaduan.show');
    Route::post('/pengaduan/{id}/tanggapi', [AdminPengaduanController::class, 'tanggapi'])->name('admin.pengaduan.tanggapi');
});



Route::prefix('dashboard/mahasiswa')->middleware('auth:mahasiswa')->group(function () {
    Route::get('/', [MahasiswaDashboardController::class, 'index'])->name('dashboard.mahasiswa');

    // Profile
    Route::get('/profile', [MahasiswaAuthController::class, 'editProfile'])->name('mahasiswa.profile');
    Route::post('/profile/update', [MahasiswaAuthController::class, 'updateProfile'])->name('mahasiswa.profile.update');

    // Pengaduan
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('mahasiswa.pengaduan.index');
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('mahasiswa.pengaduan.create');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('mahasiswa.pengaduan.store');
});
