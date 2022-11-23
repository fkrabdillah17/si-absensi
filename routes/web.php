<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
Route::get('/ex', function () {
    return view('admin.ex');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');
Route::get('/jurusan', [AdminController::class,'jurusan_index'])->name('jurusan.index');
Route::get('/jurusan/create', [AdminController::class,'jurusan_create'])->name('jurusan.create');
Route::post('/jurusan', [AdminController::class,'jurusan_store'])->name('jurusan.store');
// Route::get('/jurusan/{jurusan}', [AdminController::class,'jurusan_show'])->name('jurusan_show');
Route::get('/jurusan/{jurusan}/edit', [AdminController::class,'jurusan_edit'])->name('jurusan.edit');
Route::patch('/jurusan/{jurusan}', [AdminController::class,'jurusan_update'])->name('jurusan.update');
Route::delete('/jurusan/{jurusan}', [AdminController::class,'jurusan_destroy'])->name('jurusan.destroy');

Route::get('/kelas', [AdminController::class,'kelas_index'])->name('kelas.index');
Route::get('/kelas/create', [AdminController::class,'kelas_create'])->name('kelas.create');
Route::post('/kelas', [AdminController::class,'kelas_store'])->name('kelas.store');
Route::get('/kelas/{kelas}/edit', [AdminController::class,'kelas_edit'])->name('kelas.edit');
Route::patch('/kelas/{kelas}', [AdminController::class,'kelas_update'])->name('kelas.update');
Route::delete('/kelas/{kelas}', [AdminController::class,'kelas_destroy'])->name('kelas.destroy');

Route::get('/mapel', [AdminController::class,'mapel_index'])->name('mapel.index');
Route::get('/mapel/create', [AdminController::class,'mapel_create'])->name('mapel.create');
Route::post('/mapel', [AdminController::class,'mapel_store'])->name('mapel.store');
Route::get('/mapel/{mapel}/edit', [AdminController::class,'mapel_edit'])->name('mapel.edit');
Route::patch('/mapel/{mapel}', [AdminController::class,'mapel_update'])->name('mapel.update');
Route::delete('/mapel/{mapel}', [AdminController::class,'mapel_destroy'])->name('mapel.destroy');

Route::get('/siswa', [AdminController::class,'siswa_index'])->name('siswa.index');
Route::get('/siswa/create', [AdminController::class,'siswa_create'])->name('siswa.create');
Route::post('/siswa', [AdminController::class,'siswa_store'])->name('siswa.store');
Route::get('/siswa/{siswa}/edit', [AdminController::class,'siswa_edit'])->name('siswa.edit');
Route::patch('/siswa/{siswa}', [AdminController::class,'siswa_update'])->name('siswa.update');
Route::delete('/siswa/{siswa}', [AdminController::class,'siswa_destroy'])->name('siswa.destroy');

Route::get('/guru', [AdminController::class,'guru_index'])->name('guru.index');
Route::get('/guru/create', [AdminController::class,'guru_create'])->name('guru.create');
Route::post('/guru', [AdminController::class,'guru_store'])->name('guru.store');
Route::get('/guru/{guru}/edit', [AdminController::class,'guru_edit'])->name('guru.edit');
Route::patch('/guru/{guru}', [AdminController::class,'guru_update'])->name('guru.update');
Route::delete('/guru/{guru}', [AdminController::class,'guru_destroy'])->name('guru.destroy');

Route::get('/jadwal', [AdminController::class,'jadwal_index'])->name('jadwal.index');
Route::get('/jadwal/create', [AdminController::class,'jadwal_create'])->name('jadwal.create');
Route::post('/jadwal', [AdminController::class,'jadwal_store'])->name('jadwal.store');
Route::get('/jadwal/{jadwal}/edit', [AdminController::class,'jadwal_edit'])->name('jadwal.edit');
Route::patch('/jadwal/{jadwal}', [AdminController::class,'jadwal_update'])->name('jadwal.update');
Route::delete('/jadwal/{jadwal}', [AdminController::class,'jadwal_destroy'])->name('jadwal.destroy');


