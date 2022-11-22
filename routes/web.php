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

Route::get('/ex', function () {
    return view('admin.ex');
});
