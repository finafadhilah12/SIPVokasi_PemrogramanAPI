<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// ✅ Register Admin
Route::post('/register/admin', function (Request $request) {
    $request->merge(['role' => 'admin']);
    return app(ApiAuthController::class)->register($request);
});

// ✅ Register Mahasiswa
Route::post('/register/mahasiswa', function (Request $request) {
    $request->merge(['role' => 'mahasiswa']);
    return app(ApiAuthController::class)->register($request);
});

// ✅ Login (boleh tetap satu)
Route::post('/login', [ApiAuthController::class, 'login']);

// ✅ Endpoint untuk cek user login dan logout dengan token
Route::middleware('jwt.auth')->group(function () {
    Route::get('/me', [ApiAuthController::class, 'me']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

Route::get('/mahasiswa', [ApiAuthController::class, 'getAllMahasiswa']);
Route::get('/mahasiswa/{nim}', [ApiAuthController::class, 'getMahasiswaByNIM']);
Route::put('/mahasiswa/{id}', [ApiAuthController::class, 'updateMahasiswa']);
Route::delete('/mahasiswa/{id}', [ApiAuthController::class, 'deleteMahasiswa']);



Route::prefix('kategori')->group(function () {
    Route::get('/', [ApiAuthController::class, 'getAllKategori']);
    Route::post('/', [ApiAuthController::class, 'createKategori']);
    Route::put('/{id}', [ApiAuthController::class, 'updateKategori']);
    Route::patch('/{id}', [ApiAuthController::class, 'updateKategori']);
    Route::delete('/{id}', [ApiAuthController::class, 'deleteKategori']);
});

Route::get('/dashboard/admin/dokumentasi', function () {
    return view('dashboard.admin.dokumentasi.index');
})->name('admin.dokumentasi.index');