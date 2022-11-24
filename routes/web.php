<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('store.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MainController::class,'dashboard'])->name('dashboard');
    Route::get('/report/{siswa}', [MainController::class,'report'])->name('report');
    Route::get('/password', [MainController::class,'password_edit'])->name('password.edit');
    Route::patch('/password/{user}', [MainController::class,'password_update'])->name('password.update');
});


Route::middleware(['auth','checkRole:0'])->group(function () {
Route::get('/jurusan', [MainController::class,'jurusan_index'])->name('jurusan.index');
Route::get('/jurusan/create', [MainController::class,'jurusan_create'])->name('jurusan.create');
Route::post('/jurusan', [MainController::class,'jurusan_store'])->name('jurusan.store');
// Route::get('/jurusan/{jurusan}', [MainController::class,'jurusan_show'])->name('jurusan_show');
Route::get('/jurusan/{jurusan}/edit', [MainController::class,'jurusan_edit'])->name('jurusan.edit');
Route::patch('/jurusan/{jurusan}', [MainController::class,'jurusan_update'])->name('jurusan.update');
Route::delete('/jurusan/{jurusan}', [MainController::class,'jurusan_destroy'])->name('jurusan.destroy');

Route::get('/kelas', [MainController::class,'kelas_index'])->name('kelas.index');
Route::get('/kelas/create', [MainController::class,'kelas_create'])->name('kelas.create');
Route::post('/kelas', [MainController::class,'kelas_store'])->name('kelas.store');
Route::get('/kelas/{kelas}/edit', [MainController::class,'kelas_edit'])->name('kelas.edit');
Route::patch('/kelas/{kelas}', [MainController::class,'kelas_update'])->name('kelas.update');
Route::delete('/kelas/{kelas}', [MainController::class,'kelas_destroy'])->name('kelas.destroy');

Route::get('/mapel', [MainController::class,'mapel_index'])->name('mapel.index');
Route::get('/mapel/create', [MainController::class,'mapel_create'])->name('mapel.create');
Route::post('/mapel', [MainController::class,'mapel_store'])->name('mapel.store');
Route::get('/mapel/{mapel}/edit', [MainController::class,'mapel_edit'])->name('mapel.edit');
Route::patch('/mapel/{mapel}', [MainController::class,'mapel_update'])->name('mapel.update');
Route::delete('/mapel/{mapel}', [MainController::class,'mapel_destroy'])->name('mapel.destroy');

Route::get('/siswa', [MainController::class,'siswa_index'])->name('siswa.index');
Route::get('/siswa/create', [MainController::class,'siswa_create'])->name('siswa.create');
Route::post('/siswa', [MainController::class,'siswa_store'])->name('siswa.store');
Route::get('/siswa/{siswa}/edit', [MainController::class,'siswa_edit'])->name('siswa.edit');
Route::patch('/siswa/{siswa}', [MainController::class,'siswa_update'])->name('siswa.update');
Route::delete('/siswa/{siswa}', [MainController::class,'siswa_destroy'])->name('siswa.destroy');

Route::get('/guru', [MainController::class,'guru_index'])->name('guru.index');
Route::get('/guru/create', [MainController::class,'guru_create'])->name('guru.create');
Route::post('/guru', [MainController::class,'guru_store'])->name('guru.store');
Route::get('/guru/{guru}/edit', [MainController::class,'guru_edit'])->name('guru.edit');
Route::patch('/guru/{guru}', [MainController::class,'guru_update'])->name('guru.update');
Route::delete('/guru/{guru}', [MainController::class,'guru_destroy'])->name('guru.destroy');

Route::get('/jadwal', [MainController::class,'jadwal_index'])->name('jadwal.index');
Route::get('/jadwal/create', [MainController::class,'jadwal_create'])->name('jadwal.create');
Route::post('/jadwal', [MainController::class,'jadwal_store'])->name('jadwal.store');
Route::get('/jadwal/{jadwal}/edit', [MainController::class,'jadwal_edit'])->name('jadwal.edit');
Route::patch('/jadwal/{jadwal}', [MainController::class,'jadwal_update'])->name('jadwal.update');
Route::delete('/jadwal/{jadwal}', [MainController::class,'jadwal_destroy'])->name('jadwal.destroy');
});

Route::middleware(['auth','checkRole:1'])->group(function () {
    Route::get('/presensi', [MainController::class,'presensi_index'])->name('presensi.index');
    Route::get('/presensi/{mapel}', [MainController::class,'presensi_kelas'])->name('presensi.kelas');
    Route::get('/presensi/{mapel}/{kelas}',  [MainController::class,'presensi_siswa'])->name('presensi.siswa');
    Route::post('/presensi/{mapel}/{kelas}', [MainController::class,'presensi_store'])->name('presensi.store');
    Route::get('/history/presensi', [MainController::class,'history_presensi_index'])->name('history.presensi.index');
    Route::get('/history/presensi/{mapel}', [MainController::class,'history_presensi_kelas'])->name('history.presensi.kelas');
    Route::get('/history/presensi/{mapel}/{kelas}', [MainController::class,'history_presensi_pertemuan'])->name('history.presensi.pertemuan');
    Route::get('/history/presensi/{mapel}/{kelas}/{pertemuan}', [MainController::class,'history_presensi_show'])->name('history.presensi.show');
    Route::post('/history/presensi/{mapel}/{kelas}/{pertemuan}', [MainController::class,'history_presensi_update'])->name('history.presensi.update');
});