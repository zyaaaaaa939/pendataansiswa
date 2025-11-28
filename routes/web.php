<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalSiswa = \App\Models\Siswa::count();
    $totalJurusan = \App\Models\Jurusan::count();
    $totalKelas = \App\Models\Kelas::count();
    $totalUser = \App\Models\User::count();
    return view('dashboard', compact('totalSiswa', 'totalJurusan', 'totalKelas', 'totalUser'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('tahun-ajar', \App\Http\Controllers\TahunAjarController::class);
    Route::resource('jurusan', \App\Http\Controllers\JurusanController::class);
    Route::resource('kelas', \App\Http\Controllers\KelasController::class);
    Route::resource('siswa', \App\Http\Controllers\SiswaController::class);
    Route::get('siswa/{siswa}/promote', [\App\Http\Controllers\SiswaController::class, 'promote'])->name('siswa.promote');
    Route::post('siswa/{siswa}/promote', [\App\Http\Controllers\SiswaController::class, 'promoteStore'])->name('siswa.promote.store');
    Route::resource('user', \App\Http\Controllers\UserController::class)->middleware('can:admin');
});

require __DIR__.'/auth.php';
