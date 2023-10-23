<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\GantiPassController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\SuperadminController;

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [LoginController::class, 'register']);
Route::post('register', [LoginController::class, 'storeRegister']);
Route::get('lupa-password', [LupaPasswordController::class, 'index']);

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::prefix('superadmin')->group(function () {
        Route::get('bandingkan', [SuperadminController::class, 'bandingkan']);
        Route::get('beranda', [SuperadminController::class, 'index']);
        Route::get('/data/nomoraduan', [SuperadminController::class, 'nomor']);
        Route::post('/data/nomoraduan', [SuperadminController::class, 'updateNomor']);
        Route::get('/data/pegawai', [SuperadminController::class, 'pegawai']);
        Route::get('/data/pegawai/akun', [SuperadminController::class, 'akunPegawai']);
        Route::get('/data/pegawai/resetpass/{id}', [SuperadminController::class, 'resetPassPegawai']);
        Route::get('/data/pegawai/sync', [SuperadminController::class, 'syncPegawai']);
        Route::get('/data/pegawai/add', [SuperadminController::class, 'addPegawai']);
        Route::post('/data/pegawai/add', [SuperadminController::class, 'storePegawai']);
        Route::get('/data/pegawai/edit/{id}', [SuperadminController::class, 'editPegawai']);
        Route::post('/data/pegawai/edit/{id}', [SuperadminController::class, 'updatePegawai']);
        Route::get('/data/pegawai/delete/{id}', [SuperadminController::class, 'deletePegawai']);
        Route::get('/data/pegawai/profile/{id}', [SuperadminController::class, 'profilPegawai']);

        Route::get('/data/unitkerja/kode', [UnitKerjaController::class, 'kode']);
        Route::get('/data/unitkerja/resetpass/{id}', [UnitKerjaController::class, 'resetPass']);
        Route::get('/data/unitkerja/akun', [UnitKerjaController::class, 'akun']);
        Route::get('/data/unitkerja', [UnitKerjaController::class, 'index']);
        Route::get('/data/unitkerja/add', [UnitKerjaController::class, 'add']);
        Route::post('/data/unitkerja/add', [UnitKerjaController::class, 'store']);
        Route::get('/data/unitkerja/edit/{id}', [UnitKerjaController::class, 'edit']);
        Route::post('/data/unitkerja/edit/{id}', [UnitKerjaController::class, 'update']);
        Route::get('/data/unitkerja/delete/{id}', [UnitKerjaController::class, 'delete']);

        Route::get('role', [RoleController::class, 'index']);
        Route::get('akun', [AkunController::class, 'index']);
        Route::get('akun/add', [AkunController::class, 'create']);
        Route::post('akun/add', [AkunController::class, 'store']);
        Route::get('akun/edit/{id}', [AkunController::class, 'edit']);
        Route::post('akun/edit/{id}', [AkunController::class, 'update']);
        Route::get('akun/delete/{id}', [AkunController::class, 'delete']);
        Route::get('timeline/{id}', [SuperadminController::class, 'timeline']);
        Route::get('permohonan/delete/{id}', [SuperadminController::class, 'deletePermohonan']);
    });
});

Route::group(['middleware' => ['auth', 'role:pegawai']], function () {
    Route::prefix('pegawai')->group(function () {
        Route::get('beranda', [PegawaiController::class, 'beranda']);
        Route::post('ubahfoto', [PegawaiController::class, 'ubahfoto']);
        Route::get('biodata/edit', [PegawaiController::class, 'edit']);
        Route::get('biodata/edit/status', [PegawaiController::class, 'editStatus']);
        Route::get('biodata/edit/profile', [PegawaiController::class, 'editProfile']);
        Route::get('biodata/edit/kependudukan', [PegawaiController::class, 'editKependudukan']);
        Route::get('biodata/edit/bpjs', [PegawaiController::class, 'editBPJS']);
        Route::get('biodata/edit/pendidikan', [PegawaiController::class, 'editPendidikan']);
        Route::get('biodata/edit/alamat', [PegawaiController::class, 'editAlamat']);
        Route::get('biodata/edit/npwp', [PegawaiController::class, 'editNPWP']);
        Route::get('biodata/edit/kepegawaian', [PegawaiController::class, 'editKepegawaian']);
        Route::post('biodata/edit/kepegawaian', [PegawaiController::class, 'updateKepegawaian']);
        Route::post('biodata/edit/profile', [PegawaiController::class, 'updateProfile']);
        Route::post('biodata/edit/kependudukan', [PegawaiController::class, 'updateKependudukan']);
        Route::post('biodata/edit/bpjs', [PegawaiController::class, 'updateBPJS']);
        Route::post('biodata/edit/pendidikan', [PegawaiController::class, 'updatePendidikan']);
        Route::post('biodata/edit/alamat', [PegawaiController::class, 'updateAlamat']);
        Route::post('biodata/edit/npwp', [PegawaiController::class, 'updateNPWP']);
        Route::post('biodata/edit/status', [PegawaiController::class, 'updateStatus']);
    });
});


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('beranda', [AdminController::class, 'beranda']);
        Route::post('penghasilan', [AdminController::class, 'storePenghasilan']);
        Route::post('penghasilan/update', [AdminController::class, 'updatePenghasilan']);
    });
});
Route::group(['middleware' => ['auth', 'role:superadmin|pegawai|admin']], function () {
    Route::get('/logout', [LogoutController::class, 'logout']);

    Route::get('gantipass', [GantiPassController::class, 'index']);
    Route::post('gantipass', [GantiPassController::class, 'update']);
});
